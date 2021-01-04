<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;

    protected $fillable = [
      'point',
      'site_id',
      'user_id',
    ];

    public function site(){
        return $this->belongsTo(Site::class);
    }


}
