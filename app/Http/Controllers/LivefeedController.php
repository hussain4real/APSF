<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivefeedRequest;
use App\Http\Requests\UpdateLivefeedRequest;
use App\Models\Livefeed;
use Illuminate\View\View;

class LivefeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('livefeeds', [
            //
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
    public function store(StoreLivefeedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Livefeed $livefeed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livefeed $livefeed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivefeedRequest $request, Livefeed $livefeed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livefeed $livefeed)
    {
        //
    }
}
