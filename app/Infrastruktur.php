<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infrastruktur extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'infrastruktur';

    public function kota(){
        return $this->belongsTo('App\Kota');
    }
}
