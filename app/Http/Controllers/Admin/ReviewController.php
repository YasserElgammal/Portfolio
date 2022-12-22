<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'job' => 'required',
            'description' => 'required|min:10|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $review = new Review();
        $review->name = $validated['name'];
        $review->job = $validated['job'];
        $review->description = $validated['description'];

        if($request->hasfile('image')){
            $get_file = $request->file('image')->store('images/reviewers');
            $review->image = $get_file;
        }

        $review->save();
        return to_route('admin.review.index')->with('message','Review Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'job' => 'required',
            'description' => 'required|min:10|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $review->name = $validated['name'];
        $review->job = $validated['job'];
        $review->description = $validated['description'];

        if($request->hasfile('image')){
            if($review->image != null ){
            Storage::delete($review->image);
            }
            $get_new_file = $request->file('image')->store('images/reviewers');
            $review->image = $get_new_file;
        }

        $review->update();
        return to_route('admin.review.index')->with('message','Review Updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('admin.review.edit', compact('review'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        if($review->image != null){
            Storage::delete($review->image);
        }
        $review -> delete();
        return back()->with('message', 'Review Deleted');
    }
}
