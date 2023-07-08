<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'photo'          => $this->getPhoto($this->photo),
            'name'           => $this->name,
        ];
    }


      /**
     * @param $photo
     *
     * @return string|null
     */
    public function getPhoto($photo): ?string
    {
        if ($photo) {
            return Storage::url($photo);
        }

        return null;
    }
}
