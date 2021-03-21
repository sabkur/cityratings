<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'kota';

    public function investasi(){
        return $this->hasMany('App\Investasi');
    }

    public function infrastruktur(){
        return $this->hasMany('App\Infrastruktur');
    }

    public function pariwisata(){
        return $this->hasMany('App\Pariwisata');
    }

    public function pelayanan_publik(){
        return $this->hasMany('App\PelayananPublik');
    }

    public function rating_kota(){
        return $this->hasOne('App\RatingKota');
    }
}
