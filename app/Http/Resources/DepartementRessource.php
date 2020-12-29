<?php

namespace App\Http\Resources;

use App\Models\Departement;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartementRessource extends JsonResource
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
            'description'=>$this->description,
            'image_path'=>$this->image_path,
            'sites'=> SiteRessource::collection(Departement::find($this->id)->site),
        ];
    }
}
