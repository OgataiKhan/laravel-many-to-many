<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->validated();

        $type = new Type();
        $type->title = $data['title'];
        $type->slug = Str::of($type->title)->slug();
        $type->save(); 

        return redirect()->route('admin.types.index')->with('message', "Type $type->title added successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $data = $request->validated();

        if (isset($data['title']) && $data['title'] !== $type->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $type->update($data);

        return redirect()->route('admin.types.index')->with('message', "Type $type->title updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {

        $type_title = $type->title;

        $type->delete();

         return to_route('admin.types.index')->with('message', "Type $type_title deleted successfully!");
    }
}
