<?php

namespace App\Http\Controllers;

use App\Models\ParentStudent;
use Illuminate\Http\Request;
use App\Http\Requests\RequestParentStudent;
use Illuminate\Support\Facades\Hash;

class ParentStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents = ParentStudent::orderByDesc('id');
        $parents = $parents->paginate(50);

        return view('dashboard.parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.parents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestParentStudent $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $parent = ParentStudent::create($validated);

        return redirect(route('parents.index'))->with('success', 'Data Orang tua / Wali siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ParentStudent::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parent = ParentStudent::findOrFail($id);

        return view('dashboard.parents.edit', compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestParentStudent $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $parent = ParentStudent::findOrFail($id);

        $parent->update($validated);

        return redirect(route('parents.index'))->with('success', 'Data Orang tua / Wali siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = ParentStudent::findOrFail($id);
        $parent->delete();

        return redirect(route('parents.index'))->with('success', 'Data Orang tua / Wali siswa berhasil dihapus.');
    }
}
