<?php


namespace App\Http\Services;


use App\Http\Requests\CreateNinjaRequest;
use Illuminate\Http\Request;

interface NinjaServiceInterface
{
    function getAll();

    function findById($id);

    function store($request);

    function delete($id);

    function update($request,$id);

    function search($request);
}
