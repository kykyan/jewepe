<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    public function pilmatkul()
    {
        return $this->hasOne('App\Pilmatkul');
    }
}
