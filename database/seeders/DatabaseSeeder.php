<?php

namespace Database\Seeders;

use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\News;
use App\Models\User;
use App\Models\Views;
use App\Models\Content;
use App\Models\NewsTag;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $categoryName = ['kinh doanh', 'công nghệ', 'giải trí', 'thể thao', 'sức khỏe', 'giáo dục'];
        $categoryImage = ['cat-500x80-1.jpg', 'cat-500x80-2.jpg', 'cat-500x80-3.jpg', 'cat-500x80-4.jpg','cat-6.jpg','cat-5.jpeg'];
        foreach ($categoryName as $key => $value) {
            Category::create(
                [
                    'name' => $value,
                    'image' => "img/".$categoryImage[$key],

                ]
            );
        }
        User::factory()->create([
            'name' => 'Louis Ng',
            'email' => 'louis@gmail.com',
            "is_admin" => 1,
        ]);
        User::factory(300)->create();
        News::factory(20)->create();



        Content::factory(40)->create();

        $tags = ['chinhtri', 'kinhdoanh', 'congty', 'thethao', 'suckhoe', 'giaoduc', 'khoahoc', 'congnghe', 'thucpham', 'giaitri', 'dulich', 'phongcachsong','dacsac'];
        foreach ($tags as $t) {
            Tag::create([
                'name' => $t
            ]);
        }


        NewsTag::factory(50)->create();
        $featuredImg = ['news-300x300-1.jpg', 'news-300x300-2.jpg', 'news-300x300-3.jpg', 'news-300x300-4.jpg', 'news-300x300-5.jpg'];
        foreach ($featuredImg as $img) {
            $new = News::create([
                'title' => 'Featured news',
                'main_image' => "img/".$img,
                'category_id' => rand(1,6),
                'user_id' => 1,
                'text' => 'ancusdhfdk'
            ]);
            NewsTag::create([
                'news_id' => $new->id,
                'tag_id' => 13
            ]);
        }
        for($i = 0;$i<100;$i++){
            Views::factory(10)->create([
                'views_type' => 'category',
                'category_id' => rand(1,6)
            ]);
            Views::factory(10)->create([
                'views_type' => 'news',
                'news_id' => rand(1,20)
            ]);
            Views::factory(10)->create([
                'views_type' => 'tag',
                'tag_id' => rand(1,13)
            ]);
        }
    }

}
