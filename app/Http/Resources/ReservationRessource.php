<?php

namespace App\Http\Resources;

use App\Models\Reservation;
use App\Models\Site;
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
        if ($this->etat_reservation ==0){
            $etat= 'en attente';
        }elseif ($this->etat_reservation ==1){
            $etat= 'payer';
        }
//        return parent::toArray($request);
        return [
            'id_reservation'=>$this->id,
            'etat'=>$etat,
            'nbr_personne'=>$this->nbr_personne,
            'date_reservation'=>$this->date,
            'mode_payement'=>$this->mode_payement,
            'created_at'=>Carbon::parse($this->created_at)->format('d M. Y'),
            'site_reservation'=>SiteRessource::collection(Site::where('id',$this->site_id)->get()),
        ];
    }
}
