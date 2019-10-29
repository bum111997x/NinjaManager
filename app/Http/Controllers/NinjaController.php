<?php

namespace App\Http\Controllers;

use App\Ninja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NinjaController extends Controller
{
    protected $ninja;

    public function __construct(Ninja $ninja)
    {
        $this->ninja = $ninja;
        $this->middleware('auth');
    }

    public function index()
    {
        $ninjas = $this->ninja->all();

        return view('index', compact('ninjas'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->ninja->name = $request->name;
        $this->ninja->dateOfBirth = $request->dateOfBirth;
        $this->ninja->role = $request->role;
        $this->ninja->address = $request->address;
        $this->ninja->specialSkill = $request->specialSkill;

        if (!$request->hasFile('image')) {
            $this->ninja->image = $request->image;
        } else {
            $file = $request->file('image');
            $path = $file->store('image', 'public');
            $this->ninja->image = $path;
        }

        $this->ninja->save();

        return redirect()->route('ninja.index');
    }

    public function delete($id)
    {
        $ninja = $this->ninja->findOrFail($id);
        File::delete(storage_path('app\public\\' . $ninja->image));
        $ninja->delete();

        return redirect()->route('ninja.index');
    }

    public function edit($id)
    {
        $ninja = $this->ninja->findOrFail($id);

        return view('edit', compact('ninja'));
    }

    public function update(Request $request, $id)
    {
        $ninja = $this->ninja->findOrFail($id);

        if ($request->image) {
            File::delete(storage_path('app\public\\' . $ninja->image));
            $file = $request->file('image');
            $path = $file->store('image', 'public');
            $ninja->image = $path;
        }

        $ninja->name = $request->name;
        $ninja->dateOfBirth = $request->dateOfBirth;
        $ninja->role = $request->role;
        $ninja->address = $request->address;
        $ninja->specialSkill = $request->specialSkill;

        $ninja->save();
        return redirect()->route('ninja.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $DBSearch = DB::table('ninjas')->where('name','LIKE',"%$search%")->get();

        return view('layouts.search',compact('DBSearch'));
    }
}
