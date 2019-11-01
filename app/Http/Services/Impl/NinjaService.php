<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\NinjaRepositoryInterface;
use App\Http\Requests\CreateNinjaRequest;
use App\Http\Services\NinjaServiceInterface;
use App\Ninja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NinjaService implements NinjaServiceInterface
{
    protected $ninjaRepository;

    public function __construct(NinjaRepositoryInterface $ninjaRepository)
    {
        $this->ninjaRepository = $ninjaRepository;
    }

    function findById($id)
    {
        return $this->ninjaRepository->findById($id);
    }

    function getAll()
    {
        return $this->ninjaRepository->getAll();
    }

    function store($request)
    {
        $ninja = new Ninja();
        $ninja->name = $request->name;
        $ninja->dateOfBirth = $request->dateOfBirth;
        $ninja->role = $request->role;
        $ninja->address = $request->address;
        $ninja->specialSkill = $request->specialSkill;
        $ninja->city_id = $request->city_id;

        if (!$request->hasFile('image')) {
            $ninja->image = $request->image;
        } else {
            $file = $request->file('image');
            $path = $file->store('image', 'public');
            $ninja->image = $path;
        }

        $this->ninjaRepository->store($ninja);
    }

    function delete($id)
    {
        $ninja = $this->findById($id);
        Storage::delete('public/'.$ninja->image);
        return $this->ninjaRepository->delete($ninja);
    }


    function update($request,$id)
    {
        $ninja = $this->findById($id);

        if ($request->image) {
            Storage::delete('public/'.$ninja->image);
            $file = $request->file('image');
            $path = $file->store('image', 'public');
            $ninja->image = $path;
        }

        $ninja->name = $request->name;
        $ninja->dateOfBirth = $request->dateOfBirth;
        $ninja->role = $request->role;
        $ninja->address = $request->address;
        $ninja->specialSkill = $request->specialSkill;
        $ninja->city_id = $request->city_id;

        return $this->ninjaRepository->update($ninja);
    }

    function search($request)
    {
        $search = $request->search;
        return $this->ninjaRepository->search($search);
    }

}
