<?php

namespace App\Http\Resources\API\Application;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApplicationListCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => ApplicationResource::collection($this->collection),
        ];
    }
}
