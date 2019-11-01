<?php


namespace App\Http\Repositories;


use App\Http\Requests\CreateNinjaRequest;
use Illuminate\Http\Request;

interface NinjaRepositoryInterface
{
    function getAll();

    function findById($id);

    function store($obj);

    function delete($obj);

    function update($obj);

    function search($request);
}
