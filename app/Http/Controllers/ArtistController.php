<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all(); // Récupère tous les artistes
        return view('artists.index', compact('artists'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $artist = new Artist();
        $artist->firstname = $request->firstname;
        $artist->lastname = $request->lastname;
        $artist->save();

        return redirect()->route('artist.index')->with('success', 'Artiste créé avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.show', compact('artist'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
