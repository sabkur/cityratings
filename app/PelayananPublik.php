<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelayananPublik extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'pelayanan_publik';

    public function kota(){
        return $this->belongsTo('App\Kota');
    }
}

