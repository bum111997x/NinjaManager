<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CreateNinjaRequest;
use App\Http\Services\Impl\CityService;
use App\Http\Services\Impl\NinjaService;
use App\Ninja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NinjaController extends Controller
{
    protected $ninjaService;
    protected $cityService;

    public function __construct(NinjaService $ninjaService, CityService $cityService)
    {
        $this->ninjaService = $ninjaService;
        $this->cityService = $cityService;
        $this->middleware('auth');
    }

    public function index()
    {
        $ninjas = $this->ninjaService->getAll();
        $cities = $this->cityService->getAll();

        return view('customer.index', compact('ninjas', 'cities'));
    }

    public function create()
    {
        $cities = $this->cityService->getAll();
        return view('customer.create', compact('cities'));
    }

    public function store(CreateNinjaRequest $request)
    {
        $this->ninjaService->store($request);

        return redirect()->route('ninja.index');
    }

    public function delete($id)
    {
        $this->ninjaService->delete($id);

        return redirect()->route('ninja.index');
    }

    public function edit($id)
    {
        $ninja = $this->ninjaService->findById($id);
        $cities = $this->cityService->getAll();

        return view('customer.edit', compact('ninja', 'cities'));
    }

    public function update(CreateNinjaRequest $request, $id)
    {
        $this->ninjaService->update($request,$id);

        return redirect()->route('ninja.index');
    }

    public function search(Request $request)
    {
        $DBSearch = $this->ninjaService->search($request);

        return view('customer.search', compact('DBSearch'));
    }
}
