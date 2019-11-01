<?php


namespace App\Http\Services\Impl;


use App\City;
use App\Http\Repositories\Eloquent\CityEloquentRepository;
use App\Http\Services\CityServiceInterface;

class CityService implements CityServiceInterface
{
    protected $cityRepository;

    public function __construct(CityEloquentRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    function findById($id)
    {
        return $this->cityRepository->findById($id);
    }

    function getAll()
    {
        return $this->cityRepository->getAll();
    }

    function store($request)
    {
        $city = new City();

        $city->name = $request->name;

        $this->cityRepository->store($city);
    }


    function update($request, $id)
    {
        $city = $this->findById($id);

        $city->name = $request->name;

        $this->cityRepository->update($city);
    }
}
