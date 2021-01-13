<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
