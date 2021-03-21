<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investasi extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'investasi';

    public function kota(){
        return $this->belongsTo('App\Kota');
    }

}
