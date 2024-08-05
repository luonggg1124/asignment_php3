<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {

        $oneWeek = Carbon::now()->subDays(7);
        $topNewsItems = News::lastDaysPopularNews($oneWeek)->take(10)->get();
        $categories = Category::availableCategories(1)->hotCategories()->take(4)->get();
        $featuredTag = Tag::where('name','=','dacsac')->get()->first();
        $featuredNews = $featuredTag->news()->get();
        $newsModel = new News();
        return view('pages.index',[
            'topNews' => $topNewsItems,
            'categories' => $categories,
            'featuredNews' => $featuredNews,
            'newsModel' => $newsModel
        ]);
    }


    public function search(Request $request)
    {
        if($request->keyword && $request->keyword != ''){
            $filter = $request->only('keyword');
            $mainNews = News::filter($filter)->take(4)->get();
            $followedNews = News::filter($filter)->get() ?? News::lastDaysPopularNews(3)->take(10)->get();
            return view('pages.search',[
                'mainNews' => $mainNews,
                'followedNews' => $followedNews
            ]);
        }else{
            return redirect()->back();
        }

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
    public function show(News $news)
    {
       $news->views()->create(
        ['views_type' => 'news']
       );
        return view('pages.single',compact('news'));
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
    public function destroy(string $id)
    {
        //
    }
}
