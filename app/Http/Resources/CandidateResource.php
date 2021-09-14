<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'bio'         => $this->description,
            'profile_pic' => $this->profilePic(),
            'vote_count'  => $this->ballots()->count()
        ];
    }
}
