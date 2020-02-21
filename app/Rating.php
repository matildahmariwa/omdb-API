<?php

namespace App;
use App\User;
use App\Movie;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
   protected $guarded = [];
    public  function user(){
        return $this->belongsTo('App\User');
     }


     public function movie(){
        return $this->belongsTo('App\Movie');
     }
}
