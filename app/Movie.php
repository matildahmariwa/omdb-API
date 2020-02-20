<?php

namespace App;
use App\Rating;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title','cover_photo','year','type'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
