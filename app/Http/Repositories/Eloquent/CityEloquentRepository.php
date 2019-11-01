<?php


namespace App\Http\Repositories\Eloquent;


use App\City;
use App\Http\Repositories\CityRepositoryInterface;

class CityEloquentRepository implements CityRepositoryInterface
{
    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    function findById($id)
    {
        return $this->city->findOrFail($id);
    }

    function getAll()
    {
        return $this->city->all();
    }

    function store($obj)
    {
        $obj->save();
    }

    function update($obj)
    {
        $obj->save();
    }


}
