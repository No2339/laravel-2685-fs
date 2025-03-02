<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'comment_id' => $this->id,
            'comment' => $this->comment,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
        
            'total_comments' =>  $this->user->comments->count() ,
        
            'comment_posts' => $this->user->comments->map(function ($comment) {
                return [
                    'comment_id' => $comment->id,
                    'comment_text' => $comment->comment,
                    'post_id'=>$comment->post_id,
                    'post-title'=>$comment->post->title
                ];
            }) ,
        
        ];
      
    }
}