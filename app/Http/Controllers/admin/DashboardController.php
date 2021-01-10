<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $nbrSite = Site::all()->count();
        $nbrUser = User::all()->count();
        $nbrReservation = Reservation::all()->count();


        return view('admin.dashboard.index',[
            'nbrSite'=>$nbrSite,
            'nbrUser'=>$nbrUser,
            'nbrReservation'=>$nbrReservation,
        ]);
    }
}
