<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class OptionController extends Controller
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
    public function store(Request $request, Question $pregunta)
    {
        $request->validate([
            'text' => 'required|string',
            'is_correct' => 'boolean',
        ]);

        $pregunta->options()->create([
            'text' => $request->input('text'),
            'is_correct' => $request->has('is_correct'),
        ]);

        return back()->with('success', 'Opción agregada');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $opcion)
    {
        $opcion->delete();
        return back()->with('success', 'Opción eliminada');
    }
}
