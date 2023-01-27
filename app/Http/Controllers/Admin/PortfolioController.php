<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios= Portfolio::with('category')->get();
        return view('admin.portfolio.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio.create',compact('categories'));
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
            'title' => 'required|min:4',
            'project_url' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cat_id' => 'required|exists:categories,id'
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $validated['title'];
        $portfolio->project_url = $validated['project_url'];
        $portfolio->cat_id = $request->cat_id;

        if($request->hasfile('image')){
            $get_file = $request->file('image')->store('images/portfolios');
            $portfolio->image = $get_file;
        }

        $portfolio->save();
        return to_route('admin.portfolio.index')->with('message','Portfolio Added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = Category::all();
        return view('admin.portfolio.edit', compact('portfolio','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|min:4',
            'project_url' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $portfolio->title = $validated['title'];
        $portfolio->project_url = $validated['project_url'];
        $portfolio->cat_id = $request->cat_id;

        if($request->hasfile('image')){
            Storage::delete($portfolio->image);
            $get_file = $request->file('image')->store('images/portfolios');
            $portfolio->image = $get_file;
        }

        $portfolio->update();
        return to_route('admin.portfolio.index')->with('message','Portfolio Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if($portfolio->image != null){
            Storage::delete($portfolio->image);
        }
        $portfolio -> delete();
        return back()->with('message', 'Portfolio Deleted');
    }

    public function search(Request $request)
    {
        $searchedItem = $request->input('search');

        $portfolios = Portfolio::query()
        ->where('title', 'LIKE', "%{$searchedItem}%")
        ->orWhere('project_url', 'LIKE', "%{$searchedItem}%")
        ->get();


    // Return the search view with the resluts compacted
    return view('admin.portfolio.search', compact('portfolios'));

    }
}
