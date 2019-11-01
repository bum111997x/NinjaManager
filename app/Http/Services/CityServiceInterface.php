<?php


namespace App\Http\Services;


interface CityServiceInterface
{
    function getAll();

    function findById($id);

    function store($request);

    function update($request,$id);
}
