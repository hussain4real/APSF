<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('media')->get();

        $events = $events->map(function ($event) {
            $firstTwoImages = $event->media->filter(function ($media) {
                return $media->mime_type !== 'video/mp4';
            })->take(2);
            //in descending order
            $firstTwoImages = $firstTwoImages->sortByDesc('id');
            $event->firstTwoImages = $firstTwoImages;

            return $event;
        });
        //return the latest events first
        $events = $events->sortByDesc('id');

        return view('home.events.index', compact('events'));
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
    public function show(Event $event)
    {
        $event = $event->load('media');

        //get video media
        $videos = $event->media->filter(function ($media) {
            return $media->mime_type === 'video/mp4';
        })->take(2);

        //get images only
        //        $images = $event->media->filter(function ($media) {
        //            return $media->mime_type !== 'video/mp4';
        //        });
        //get images that are not the first two
        $images = $event->media->filter(function ($media) {
            return $media->mime_type !== 'video/mp4';
        })->slice(2);

        //get the first image
        $firstImage = $event->media->filter(function ($media) {
            return $media->mime_type !== 'video/mp4';
        })->first();

        //get image at random
        if ($event->media->count() > 2) {
            $randomImage = $event->media->filter(function ($media) {
                return $media->mime_type !== 'video/mp4';
            })->random();
        } else {
            $randomImage = null;
        }
        //        $randomImage = $event->media->filter(function ($media) {
        //            return $media->mime_type !== 'video/mp4';
        //        })->random() ?? null;

        return view('home.events.show', [
            'event' => $event,
            'videos' => $videos,
            'images' => $images,
            'firstImage' => $firstImage,
            'randomImage' => $randomImage,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
