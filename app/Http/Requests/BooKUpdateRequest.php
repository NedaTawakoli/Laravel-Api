<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooKUpdateRequest extends FormRequest
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
            //
            "title"=>"nullable|string|min:5",
            "isbn"=>"nullable|string|unique:isbn",
            "description"=>"nullable|string",
            "published_at"=>"nullable|date",
            "total_copies"=>"nullable|integer|max:200",
            "cover_image"=>"nullable|string",
            "price"=>"nullable|numeric",
            "author_id"=>"nullable|exists:author,id",
            "genre"=>"nullable|string"
        ];
    }
}
