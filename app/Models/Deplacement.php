<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deplacement extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'type',
        'image_path',
        'etat',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
