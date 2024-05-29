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
        $votes = PublicVote::all();
        $totalVotes = [
            'option1' => $votes->sum('option1'),
            'option2' => $votes->sum('option2'),
            'option3' => $votes->sum('option3'),
        ];

        return response()->json($totalVotes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publicVote = PublicVote::first();
        //        dd($publicVote);

        return view('public-vote', compact('publicVote'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //        dd($request->all());
        // Validation rules
        $validator = Validator::make($request->all(), [
            'option' => 'required|integer|between:1,3',
        ]);

        if ($validator->fails()) {
            return response()
                ->json(['error' => 'Invalid vote option'], 400);
        }

        $ipAddress = $request->ip();

        // Check if the IP address has already voted
        if (PublicVote::where('ip_address', $ipAddress)->exists()) {
            //            return redirect()->to('/about')->with('error', 'You have already voted');
            return response()->json(['error' => 'You have already voted'], 403);
        }

        // Retrieve the existing vote
        $vote = PublicVote::first();
        //        dd($vote);

        // Update the IP address

        //        dd($vote);
        // Increment the selected option
        switch ($request->option) {
            case 1:
                $vote->increment('option1');
                break;
            case 2:
                $vote->increment('option2');
                break;
            case 3:
                $vote->increment('option3');
                break;
        }
        $vote->ip_address = $ipAddress;
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
