<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\NinjaRepositoryInterface;
use App\Http\Requests\CreateNinjaRequest;
use App\Ninja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NinjaEloquentRepository implements NinjaRepositoryInterface
{
    protected $ninja;

    public function __construct(Ninja $ninja)
    {
        $this->ninja = $ninja;
    }

    public function getAll()
    {
        return $this->ninja->all();
    }

    function findById($id)
    {
        return $this->ninja->findOrFail($id);
    }

    function store($obj)
    {
        $obj->save();
    }

    function delete($obj)
    {
        $obj->delete();
    }


    function update($obj)
    {
        $obj->save();
    }

    function search($request)
    {
         return $this->ninja->where('name', 'LIKE', "%$request%")->get();
    }
}
