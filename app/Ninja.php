<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ninja extends Model
{
    protected $fillable = [
        'name', 'dateOfBirth', 'role','address','specialSkill','image',
    ];
}
