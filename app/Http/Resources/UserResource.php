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
       count($this->polls)? $voted = true: $voted = false;
        return[
            'id'=>$this->id,
            'mobile'=>$this->mobile,
            'voted'=>$voted,
        ];
    }
}
