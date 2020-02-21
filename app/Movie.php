<?php

namespace App;
use App\Rating;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title','cover_photo','year','type'
    ];
    public $appends = ['average_rating'];

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    public function getAverageRatingAttribute() 
    {
        return $this->rating->average('star_value');
    }
}
