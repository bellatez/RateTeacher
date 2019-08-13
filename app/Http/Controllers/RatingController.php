<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rating = new Rating([
            'user_id' => auth()->user()->id,
            'rating' =>$request->rating,
            'review' => $request->review,
            'user_name' => auth()->user()->name,
            'lessoncount' => $request->lessoncount,
            'language' => $request->language
        ]);

        $rating ->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        return view('teacher', compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        $rating->update([
            'rating' =>$request->rating,
            'review' => $request->review,
            'lessoncount' => $request->lessoncount,
            'language' => $request->language
        ]);

        $rating ->save();
        // var_dump($rating->save());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Rating::where('id', $request->id)->delete();
        return redirect()->back();
    }
}
