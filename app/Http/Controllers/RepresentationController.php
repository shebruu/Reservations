<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representation;
use App\Models\Show;
use App\Models\Reservation;
use Carbon\Carbon;

use App\Http\Requests\RepresentationRequest;
use Illuminate\Support\Facades\Auth;

class RepresentationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $representations = Representation::all();

        return view('representations.index', [
            'representations' => $representations,
            'resource' => 'representations',
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $representation = Representation::find($id);
        //Carbon pour formater l' heure
        $date = Carbon::parse($representation->when)->format('d/m/Y');
        $time = Carbon::parse($representation->when)->format('G:i');

        return view('representations.show', [
            'representation' => $representation,
            'date' => $date,
            'time' => $time,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRepresentationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepresentationRequest $request)
    {
        $representation = new Representation($request->validated());
        $representation->save();

        return redirect()->route('representation.index')->with('success', 'Représentation créée avec succès.');
    }

    /*
    public function update(Request request,id){


    }
    */

    public function book(Request $request, $id)
    {
        $validated = $request->validate([
            'places' => 'required|integer|min:1'
        ]);

        // Trouver la représentation spécifique
        $representation = Representation::findOrFail($id);

        // Vérifier si la représentation est réservable
        if (!$representation->show->bookable) {
            return redirect()->route('representation.show', $id)
                ->with('error', 'Cette représentation n\'est pas réservable.');
        }

        // Créer une nouvelle réservation
        $reservation = new Reservation();
        //id de user authentifié
        $reservation->user_id = Auth::id();
        $reservation->representation_id = $representation->id;
        $reservation->places = $validated['places'];

        // Sauvegarder la réservation
        $reservation->save();

        return redirect()->route('representation.show', $id)
            ->with('success', 'Réservation effectuée avec succès.');
    }
}
