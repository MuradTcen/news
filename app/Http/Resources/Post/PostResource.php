<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'author' => $this->get_author_name(),
            'watches' => $this->watches,
            'href' => route('downloadfile', $this->attachment_file),
        ];
    }
}
