<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            "title" => "required|string",
            "main_image" => "nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "text" => "required|string",
            "category_id" => "integer|exists:categories,id",
        ];
    }
}
