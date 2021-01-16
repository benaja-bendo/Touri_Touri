<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

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
        return view('admin.reservations.payer');
    }

    public function accepter($id,$status)
    {
//        dd($status,$id);
        $reservation = Reservation::findOrFail($id);
        $reservation->etat_reservation = $status;
        if ($reservation->save()){
            return back()->with('success', 'la reservation est accepter');
        }
    }
}
