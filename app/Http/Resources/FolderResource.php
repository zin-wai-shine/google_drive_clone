<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FolderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
           'id' => $this->id,
           'name' => $this->name,
           'user_info' => new UserResource($this->user),
           'files' => FileResource::collection($this->files),
           'time' => $this->created_at->format("h:i:s A"),
           'date' => $this->created_at->format("d/M/Y"),
       ];
    }
}
