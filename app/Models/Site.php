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

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function galerie()
    {
        return $this->hasMany(Galerie::class)->orderBy('created_at','DESC');
    }

    public function deplacement(){
        return $this->hasMany(Deplacement::class)->orderBy('created_at','DESC');
    }

    public function shop(){
        return $this->hasMany(Shop::class)->orderBy('created_at','DESC');
    }
    public function restaurant(){
        return $this->hasMany(Restaurant::class)->orderBy('created_at','DESC');
    }

}
