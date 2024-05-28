<?php

namespace App\Http\Controllers;

use App\Models\PublicVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublicVoteController extends Controller
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
        $publicVote = PublicVote::first();

        return route('public-vote.create', compact('publicVote'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        // Validation rules
        $validator = Validator::make($request->all(), [
            'option' => 'required|integer|between:1,3',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid vote option'], 400);
        }

        $ipAddress = $request->ip();

        // Check if the IP address has already voted
        if (PublicVote::where('ip_address', $ipAddress)->exists()) {
            return response()->json(['error' => 'You have already voted'], 403);
        }

        // Create or update vote count
        $vote = new PublicVote();
        $vote->ip_address = $ipAddress;

        switch ($request->option) {
            case 1:
                $vote->option1++;
                break;
            case 2:
                $vote->option2++;
                break;
            case 3:
                $vote->option3++;
                break;
        }

        $vote->save();

        return response()->json(['success' => 'Vote recorded successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(PublicVote $publicVote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicVote $publicVote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PublicVote $publicVote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicVote $publicVote)
    {
        //
    }
}
