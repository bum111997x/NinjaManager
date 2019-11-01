<?php


namespace App\Http\Repositories;


interface CityRepositoryInterface
{
    function getAll();

    function findById($id);

    function store($obj);

    function update($obj);

}
