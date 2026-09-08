<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $polls = [];
        foreach($this->polls as $poll){
            $polls[]=['question'=>$poll->option->question->question,'answer'=>$poll->option->option];
        }
        return[
            'id'=>$this->id,
            'mobile'=>$this->mobile,
            'polls'=>$polls,
        ];
    }
}
