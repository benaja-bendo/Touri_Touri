<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReservationRessource;
use App\Http\Resources\RestaurantRessource;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ReservationRessource::collection(Reservation::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ReservationRessource
     */
    public function store(Request $request)
    {
//        dd($request->all());
        Validator::make($request->all(), [
            'nbr_personne' => ['required','numeric'],
            'date' => ['required'],
            'user_id' => ['required'],
            'site_id' => ['required'],
        ])->validate();

        $reservation = new Reservation();
        $reservation->nbr_personne = $request->nbr_personne;
        $reservation->date = $request->date;
        $reservation->mode_payement = $request->mode_payement;
        $reservation->user_id = $request->user_id;
        $reservation->site_id = $request->site_id;
        if ($reservation->save()){
            return new ReservationRessource($reservation);
        }
        else {
            return response([
                'statut' => 0
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ReservationRessource
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        if ($reservation){
            return new ReservationRessource($reservation);
        }else{
            return response([
                'statut' => 0
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
