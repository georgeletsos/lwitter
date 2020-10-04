<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use App\Http\Resources\Like as LikeResource;
use App\Http\Resources\Dislike as DislikeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Tweet extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'created_at' => $this->created_at,
            'user' => new UserResource($this->whenLoaded('user')),
            'likes' => LikeResource::collection($this->whenLoaded('likes')),
            'dislikes' => DislikeResource::collection($this->whenLoaded('dislikes')),
        ];
    }
}
