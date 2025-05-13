<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            //'description' => $this->description,
            //'category' => $this->category,

            'category' => CategoryResource::collection(
                $this->whenloaded('category')
            )

            /*'category' => $this->whenLoaded('category', function () {
                return $this->category->type;
            }),*/

            //'category' => new CategoryResource($this->whenLoaded('category')),




            ///////////// Not Working, Why? /////////////
            /*'category' => CategoryResource::collection(
                $this->whenloaded('category') 
            )
            //////////////////////////////////////////////
            'category' => $this->when(
                $request->user()->tokenCan('role:admin'),
                $this->category->name
            )*/  
        ];
    }
}
