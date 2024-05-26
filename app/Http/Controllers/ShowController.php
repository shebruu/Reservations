<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Location;

use App\Http\Requests\ShowRequest;

use App\Models\Tag;

class ShowController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Show::query();

        // Recherche par nom de spectacle
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        // Trier par tag
        if ($request->filled('tag')) {
            $tag = Tag::where('name', $request->input('tag'))->first();
            if ($tag) {
                $query->whereHas('tags', function ($q) use ($tag) {
                    $q->where('tag_id', $tag->id);
                });
            }
        }

        $shows = $query->get();
        $tags = Tag::all();

        if ($request->ajax()) {
            return response()->json([
                'shows' => view('show.partials.shows', compact('shows'))->render(),
            ]);
        }

        return view('show.index', [
            'shows' => $shows,
            'tags' => $tags,
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


        //  dd($collaborateurs);

        return view('show.show', [
            'show' => $show,
            'collaborateurs' => $collaborateurs,


        ]);
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $shows = Show::where('title', 'like', '%' . $query . '%')
            ->orWhereHas('tags', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->get();

        return view('show.search_results', [
            'shows' => $shows,
            'query' => $query,
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
