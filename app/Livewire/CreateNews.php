<?php

namespace App\Livewire;


use App\Models\News;
use Livewire\Component;
use Livewire\WithFileUploads;
class CreateNews extends Component
{
    use WithFileUploads;

    public $news = [];

    public $content = [];

    public $contents = [];


    public function rules()
    {
        return [
            "news.title" => "required|string",
            "news.main_image" => "required|max:2048",
            "news.text" => "required|string",
            "news.category_id" => "required|integer|exists:categories,id",

            "content.*.title" => "required|string",
            "content.*.image" =>"required|max:2048",
            "content.*.content" => "required|string",
            "content.*.image_side" => "required",
        ];
    }

    public function messages()
    {
        return [
            "news.title.required" => "Title is required.",
            "news.main_image.required" => "This field is required.",
            "news.text.required" => "Text is required.",
            "news.category_id.required" => "Category is required.",
            "news.category_id.exists" => "Category invalid.",

            'content.*.title.required' => "Title is required.",
            "content.*.image.required" => "This field is required.",
            "content.*.content.required" => "Text is required.",
            "content.*.image_side" => "Please choose a side for the image"
        ];
    }

    public function render()
    {
        return view('livewire.create-news');
    }

    public function createNews(){
        $validated = $this->validate();
        $file = $validated["news"]["main_image"];
        $file->store("","public");
        $path = "livewire-tmp/".$file->hashName();
        $validated["news"]["main_image"] = $path;
        $news = News::create([
            ...$validated["news"],
            "user_id" => request()->user()->id,
            ]);
        if(isset($validated["content"]) && !empty($validated["content"])){
            foreach ($validated["content"] as $item) {
                $contentFile = $item["image"];
                $contentFile->store("","public");
                $path = "livewire-tmp/".$contentFile->hashName();
                $item["image"] = $path;
                $news->contents()->create($item);
           }
        }
        return redirect()->route("admin.index");
    }
    public function addContent()
    {
        if(empty($this->contents))
        $this->contents[] = 0;
        else $this->contents[] = $this->contents[0]+1;
    }
}
