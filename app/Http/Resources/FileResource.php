<?php

namespace App\Http\Resources;

use App\Models\Folder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $fileUrl = asset(Storage::url($this->new_name));
        return [
            'id'=> $this->id,
            'original_name' => $this->original_name,
            'file_url' => $fileUrl,
            'extension' => $this->extension,
            'user_info' => new UserResource($this->user),
            'time' => $this->created_at->format("h:i:s A"),
            'date' => $this->created_at->format("d/M/Y"),
        ];
    }
}
