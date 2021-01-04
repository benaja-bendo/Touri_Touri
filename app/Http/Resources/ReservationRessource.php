<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationRessource extends JsonResource
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
            'nbr_personne'=>$this->nbr_personne,
            'date'=>$this->date,
            'mode_payement'=>$this->mode_payement,
            'created_at'=>Carbon::parse($this->created_at)->format('d M. Y'),
        ];
    }
}
