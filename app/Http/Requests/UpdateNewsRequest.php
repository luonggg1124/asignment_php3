<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "news.title" => "required|string",
            "news.text" => "required|string",
            "news.category_id" => "required|integer|exists:categories,id",

            "content.*.title" => "required|string",
            "content.*.content" => "required|string",
            "content.*.image_side" => "required",
        ];
    }
    public  function messages(): array
    {
        return [
            "news.title.required" => "Title is required.",
            "news.text.required" => "Text is required.",
            "news.category_id.required" => "Category is required.",
            "news.category_id.exists" => "Category invalid.",

            'content.*.title.required' => "Title is required.",
            "content.*.content.required" => "Text is required.",
            "content.*.image_side" => "Please choose a side for the image"
        ];
    }
}
