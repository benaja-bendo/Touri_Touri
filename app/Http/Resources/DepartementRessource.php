<?php

namespace App\Http\Resources;

use App\Models\Departement;
use Carbon\Carbon;
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
            'created_at'=> Carbon::parse($this->created_at)->format('d M. Y'),
            'updated_at'=> Carbon::parse($this->updated_at)->format('d M. Y'),
            'nbr_sites'=> count(SiteRessource::collection(Departement::find($this->id)->site)),
            'sites'=> SiteRessource::collection(Departement::find($this->id)->site),
        ];
    }
}
