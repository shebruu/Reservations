<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

use App\Http\Requests\ArtistRequest;

use Illuminate\Support\Facades\App;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        App::setLocale('fr');
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

    public function store(ArtistRequest $request)
    {
        // Valider les données requises

        $artist = Artist::create($request->validated());

        /* Créer et sauvegarder l'artiste avec les données validées
        $artist = new Artist();
        $artist->firstname = $request->firstname;
        $artist->lastname = $request->lastname;
        $artist->save();
*/
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
    public function edit($id)
    {
        $artist = Artist::find($id);

        return view('artists.edit', [
            'artist' => $artist,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ArtistRequest $request, string $id)
    {
        // Récupérer l'artiste à modifier
        $artist = Artist::find($id);

        // Mise à jour des données et sauvegarde dans la base de données avec des données déjà validées.
        $artist->update($request->validated());

        return redirect()->route('artist.index', [
            'artist' => $artist,
        ])->with('success', 'Artiste mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();

        return redirect()->route('artist.index')->with('success', 'Artiste supprimé avec succès.');
    }
}
