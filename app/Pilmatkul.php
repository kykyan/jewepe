<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilmatkul extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function matkul()
    {
        return $this->belongsTo('App\Matkul');
    }
}
