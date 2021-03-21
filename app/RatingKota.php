<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingKota extends Model
{
    public $timestamps = false;
    protected $table = 'rating_kota';

    public function kota(){
        return $this->belongsTo('App\Kota');
    }
}
