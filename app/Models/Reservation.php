<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable=[
      'id',
      'nbr_personne',
      'date',
      'mode_payement',
      'user_id ',
      'site_id ',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
