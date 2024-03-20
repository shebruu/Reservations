<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representation;
use Carbon\Carbon;

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
}
