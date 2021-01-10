<?php

namespace App\Http\Resources;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'image_path'=>$this->image_path,
//            'site_id'=> Shop::find($this->id)->site->id,
            'updated_at'=> Carbon::parse($this->updated_at)->format('d M. Y'),
        ];
    }
}
