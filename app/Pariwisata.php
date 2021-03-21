<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pariwisata extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'pariwisata';

    public function kota(){
        return $this->belongsTo('App\Kota');
    }
}
