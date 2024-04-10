<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Locality;
use App\Http\Requests\LocalitiesRequest;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(LocalitiesRequest $request)
    {
        $validated = $request->validated();

        $locality = new Locality();
        $locality->fill($validated);
        $locality->save();

        return redirect()->route('locality.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
     */
    public function update(LocalitiesRequest $request, Locality $locality)
    {
        $validated = $request->validated();

        $locality->fill($validated);
        $locality->save();

        return redirect()->route('locality.show', $locality->id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
