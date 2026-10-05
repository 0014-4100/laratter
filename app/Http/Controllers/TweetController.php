<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = Tweet::all();

         return view('tweets.index', compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
{
    return view('tweets.create');
}    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tweet = new Tweet();
        $tweet->tweet = $request->tweet;
        $tweet->user_id = auth()->id();
        $tweet->save();

        return redirect()->route('tweets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
{
    return view('tweets.show', compact('tweet'));
}
    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Tweet $tweet)
{
    return view('tweets.edit', compact('tweet'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet)
{
    $request->validate([
        'tweet' => 'required|max:255',
    ]);

    $tweet->update($request->only('tweet'));

    return redirect()->route('tweets.show', $tweet);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
{
    $tweet->delete();

    return redirect()->route('tweets.index');
}
}
