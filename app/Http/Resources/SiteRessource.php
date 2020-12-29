<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteRessource extends JsonResource
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
            'id'=> $this->id,
            'title'=> $this->title,
            'description'=> $this->description,
            'imageP_path'=> $this->imageP_path,
            'prix'=> $this->prix,
            'santer_securite'=> $this->santer_securite,
            'created_at'=> Carbon::parse($this->created_at)->format('d M. Y'),
            'updated_at'=> Carbon::parse($this->updated_at)->format('d M. Y'),
        ];
    }
}