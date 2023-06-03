<?php

namespace App\Http\Controllers;

use App\Models\DataPenugasanPendidik;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateDataPenugasanPendidik;
use App\Models\Pendidik;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DataPenugasanPendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = DataPenugasanPendidik::orderByDesc('id');
        $assignments = $assignments->paginate(50);

        return view('dashboard.assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPendidik = Pendidik::orderByDesc('id')->get(['id', 'nama']);
        return view('dashboard.assignments.create', compact('dataPendidik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateDataPenugasanPendidik $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $assignment = DataPenugasanPendidik::create($validated);

        return redirect(route('assignments.index'))->with('success', 'Data Penugasan Pendidik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DataPenugasanPendidik::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = DataPenugasanPendidik::findOrFail($id);
        $dataPendidik = Pendidik::orderByDesc('id')->get(['id', 'nama']);

        return view('dashboard.assignments.edit', compact('assignment', 'dataPendidik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateDataPenugasanPendidik $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $assignment = DataPenugasanPendidik::findOrFail($id);

        $assignment->update($validated);

        return redirect(route('assignments.index'))->with('success', 'Data Penugasan Pendidik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = DataPenugasanPendidik::findOrFail($id);
        $assignment->delete();

        return redirect(route('assignments.index'))->with('success', 'Data Penugasan Pendidik berhasil dihapus.');
    }
}
