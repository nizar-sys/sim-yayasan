<?php

namespace App\Http\Controllers;

use App\Models\EducatorChildren;
use Illuminate\Http\Request;
use App\Http\Requests\RequestEducatorChildren;
use App\Models\Pendidik;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EducatorChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childrens = EducatorChildren::orderByDesc('id');
        $childrens = $childrens->paginate(50);

        return view('dashboard.childrens.index', compact('childrens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPendidik = Pendidik::orderByDesc('id')->get(['id', 'nama']);
        return view('dashboard.childrens.create', compact('dataPendidik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestEducatorChildren $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $children = EducatorChildren::create($validated);

        return redirect(route('childrens.index'))->with('success', 'Data Anak Pendidik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EducatorChildren::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $children = EducatorChildren::findOrFail($id);
        $dataPendidik = Pendidik::orderByDesc('id')->get(['id', 'nama']);

        return view('dashboard.childrens.edit', compact('children', 'dataPendidik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEducatorChildren $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $children = EducatorChildren::findOrFail($id);

        $children->update($validated);

        return redirect(route('childrens.index'))->with('success', 'Data Anak Pendidik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $children = EducatorChildren::findOrFail($id);
        $children->delete();

        return redirect(route('childrens.index'))->with('success', 'Data Anak Pendidik berhasil dihapus.');
    }
}
