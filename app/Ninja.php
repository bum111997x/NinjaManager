<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ninja extends Model
{
    protected $fillable = [
        'name', 'dateOfBirth', 'role', 'address', 'city_id', 'specialSkill', 'image',
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
