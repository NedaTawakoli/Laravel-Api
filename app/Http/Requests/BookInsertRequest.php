<?php

namespace App\Http\Requests;

use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookInsertRequest extends FormRequest
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
            "title"=>"required|string|min:5",
            "isbn"=>["required","string",
            Rule::unique('books','isbn')->ignore($this->route('book'),'id')
            ],
            "description"=>"nullable|string",
            "published_at"=>"required|date",
            "total_copies"=>"nullable|integer|max:200",
            "cover_image"=>"required|string",
            "price"=>"required|numeric",
            "author_id"=>"required|exists:author,id",
            "genre"=>"required|string",
            "author"=> new AuthorResource($this->whenLoaded('author',))
        ];
    }
}
