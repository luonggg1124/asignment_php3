<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $mainNews = $category->news()->take(4)->get();
        $followedNews = $category->news()->take(12)->lastDaysPopularNews(Carbon::now()->subDays(3))->get();
        return view('pages.category_show',[
            'category' => $category,
            'mainNews' => $mainNews,
            'followedNews' => $followedNews
        ]);
    }
}
