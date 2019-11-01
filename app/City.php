<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function ninjas()
    {
        return $this->hasMany('App\Ninja');
    }
}
