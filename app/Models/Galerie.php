<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
    use HasFactory;

    protected $fillable =[
      'title',
      'image_path',
    ];

    public function site(){
        return $this->belongsTo(Site::class);
    }
}
