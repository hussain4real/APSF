<?php

namespace App\Http\Controllers;

use App\Models\BoardOfTrustee;
use Illuminate\Http\Request;

class BoardOfTrusteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boardOfTrusteesModel = \Illuminate\Support\Facades\Cache::remember('board_of_trustees', 60 * 60 * 24, function () {
            return \App\Models\BoardOfTrustee::orderBy('order')->get();
        });

        return view('home.board.index', compact('boardOfTrusteesModel'));

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BoardOfTrustee $boardOfTrustee)
    {
        $boardOfTrustee->load('media');

        return view('home.board.show', compact('boardOfTrustee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoardOfTrustee $boardOfTrustee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoardOfTrustee $boardOfTrustee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardOfTrustee $boardOfTrustee)
    {
        //
    }
}
