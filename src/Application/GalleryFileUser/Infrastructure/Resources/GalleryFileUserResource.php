<?php

namespace Src\Application\GalleryFileUser\Infrastructure\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GalleryFileUserResource extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request):array
    {
        return [
            "galleryFileUserId"=> $this->id,
            "gallery"=>$this->gallery_id,
            "file_user_id"=> "98ea5844-289d-476e-aaa6-0733410d9cd4",
            "updated_at"=> "2023-04-16T17:49:33.000000Z",
            "created_at"=> "2023-04-16T17:49:33.000000Z",
        ];
    }
}
