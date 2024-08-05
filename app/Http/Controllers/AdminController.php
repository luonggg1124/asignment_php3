<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateNewsRequest;
use App\Models\Content;
use App\Models\News;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = News::latest()->paginate(10);
        if($request->keyword && $request->keyword != ''){
            $filter = $request->only('keyword');
            $news = News::filter($filter)->paginate(10);

        }

        return view('admin.news.index',[
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.update',compact("news"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $validated = $request->only("news","content");
        $newsArr = $validated["news"];

        if(isset($newsArr["main_image"])){
            $newsArr["main_image"]->store("","public");
            $newsArr["main_image"] = "livewire-tmp/".$newsArr["main_image"]->hashName();
        }else{
            $newsArr["main_image"] = $news->main_image;
        }

        $news->update([
            "title" => $newsArr["title"],
            "main_image" => $newsArr["main_image"],
            "text" => $newsArr["text"],
            "category_id" => $newsArr["category_id"],
        ]);
        $contents = $validated["content"];
        foreach ($contents as $content){
            $c = Content::findOrFail($content["id"]);

            if(isset($content["image"])){
                $content["image"]->store("","public");
                $content["image"] = "livewire-tmp/".$content["image"]->hashName();
            }else{
                $content["image"] = $c->image;
            }
            $c->update([
                "title" => $content["title"],
                "image" => $content["image"],
                "content" => $content["content"],



            ]);
        }
        return redirect()->route('admin.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->contents()->delete();
        $news->views()->delete();
        $news->tags()->detach($news->id);
        $news->delete();

        return redirect()->route('admin.index');
    }
}
