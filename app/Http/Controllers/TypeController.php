<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;


use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('types.index', [
            'types' => $types,
            'resource' => 'types',
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
    public function store(TypeRequest $request)
    {
        //  la logique de stockage.
        $validated = $request->validated();


        $type = new Type();
        $type->fill($validated);
        $type->save();


        return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $type = Type::find($id);


        return view('types.show', [
            'type' => $type,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {

        $validated = $request->validated();

        // mise  à jour l'instance de Type avec les données validées.
        $type->fill($validated);
        $type->save();

        return redirect()->route('type.show', $type->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}
