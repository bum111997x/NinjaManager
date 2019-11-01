<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Services\Impl\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $cityService;

    public function __construct(CityService $cityService)
    {
       $this->cityService = $cityService;
    }

    public function index()
    {
        $cities = $this->cityService->getAll();

        return view('city.index', compact('cities'));
    }

    public function create()
    {
        return view('city.create');
    }

    public function store(Request $request)
    {
        $this->cityService->store($request);

        return redirect()->route('city.index');
    }

    public function edit($id)
    {
        $city = $this->cityService->findById($id);

        return view('city.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $this->cityService->update($request,$id);

        return redirect()->route('city.index');
    }

    public function list($id)
    {
        $city = $this->cityService->findById($id);
        $ninjas = $city->ninjas;

        return view('city.list',compact('ninjas'));
    }
}
