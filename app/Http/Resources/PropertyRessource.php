<?php

namespace App\Http\Resources;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyRessource extends JsonResource
{
    public static $wrap = 'property';
    /**
     * Transform the resource into an array.
     *@property Property $resource Cela permet à notre éditeur de comprendre que 
        * cette propriété est de type Property
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->resource->id,
            'title' => $this->resource->title,
            $this->mergeWhen(false, [
                'price' => $this->resource->price,
                'surface' => $this->resource->surface
            ]),
            'options' => OptionRessource::collection($this->whenLoaded('options'))
        ];
    }
}
