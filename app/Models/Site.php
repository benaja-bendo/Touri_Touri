<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'description',
      'imageP_path',
      'prix',
      'santer_securite',
      'departement_id',
    ];

    public function departement(){
        return $this->belongsTo(Departement::class);
    }
}
