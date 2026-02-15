<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "title",
            "isbn",
            "description",
            "published_at",
            "total_copies",
            "available_copies",
            "cover_image",
            "status",
            "price",
            "author_id",
            "genre",
        ];
    }
}
