<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ReservationController extends Controller
{
    public function attente()
    {
        $reservations = Reservation::select('*', 'reservations.created_at as created_reservation','reservations.id as reservations_id')
            ->where('etat_reservation', '0')
            ->leftjoin('users', 'users.id', '=', 'reservations.user_id')
            ->leftjoin('sites', 'sites.id', '=', 'reservations.site_id')
            ->get();
//        dd($reservations);
        return view('admin.reservations.attente', [
            'reservations' => $reservations,
            'nbr_reservation' => $reservations->count()
        ]);
    }

    public function payer()
    {
        $reservations = Reservation::select('*', 'reservations.created_at as created_reservation','reservations.id as reservations_id')
        ->where('etat_reservation', '1')
        ->leftjoin('users', 'users.id', '=', 'reservations.user_id')
        ->leftjoin('sites', 'sites.id', '=', 'reservations.site_id')
        ->get();
        return view('admin.reservations.payer',[
            'reservations' => $reservations,
            'nbr_reservation' => $reservations->count()
        ]);
    }

    public function accepter($id,$status)
    {
//        dd($status,$id);
        $reservation = Reservation::findOrFail($id);
        $reservation->etat_reservation = $status;
        $reservation->updated_at = Date::now();
        if ($reservation->save()){
            return back()->with('success', 'la reservation est accepter');
        }
    }
}
