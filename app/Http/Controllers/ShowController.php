<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Location;

use App\Http\Requests\ShowRequest;

class ShowController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::all();

        return view('show.index', [
            'shows' => $shows,
            'resource' => 'spectacles',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShowRequest $request)
    {
        $show = Show::create($request->validated());
        return redirect()->route('show.index')->with('success', 'Spectacle créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $show = Show::find($id);

        //Récupérer les artistes du spectacle et les grouper par type
        $collaborateurs = [];

        foreach ($show->artistTypes as $at) {
            $collaborateurs[$at->type->type][] = $at->artist;
        }


        return view('show.show', [
            'show' => $show,
            'collaborateurs' => $collaborateurs,


        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ShowRequest  $request
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(ShowRequest $request, Show $show)
    {
        $show->update($request->validated());
        return redirect()->route('show.index')->with('success', 'Spectacle mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $show = Show::findOrFail($id);
        $show->delete();

        // Rediriger vers la liste des spectacles avec un message de succès
        return redirect()->route('show.index')->with('success', 'Spectacle supprimé avec succès.');
    }
}
