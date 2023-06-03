<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPendidikanFormalPendidik;
use Illuminate\Http\Request;
use App\Http\Requests\RequestRiwayatPendidikanFormalPendidik;
use App\Models\Pendidik;
use Illuminate\Support\Facades\Auth;

class RiwayatPendidikanFormalPendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = RiwayatPendidikanFormalPendidik::orderByDesc('id')
        ->when(Auth::user()->educator != null, function($query) {
            return $query->where('pendidik_id', Auth::user()->educator->id);
        })
        ->get();

        return view('dashboard.educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPendidik = Pendidik::orderByDesc('id')
        ->when(Auth::user()->educator != null, function($query) {
            return $query->where('id', Auth::user()->educator->id);
        })
        ->get(['id', 'nama']);
        return view('dashboard.educations.create', compact('dataPendidik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestRiwayatPendidikanFormalPendidik $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $education = RiwayatPendidikanFormalPendidik::create($validated);

        return redirect(route('educations.index'))->with('success', 'Data Riwayat Pendidikan Pendidik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RiwayatPendidikanFormalPendidik::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = RiwayatPendidikanFormalPendidik::findOrFail($id);
        $dataPendidik = Pendidik::orderByDesc('id')
        ->when(Auth::user()->educator != null, function($query) {
            return $query->where('id', Auth::user()->educator->id);
        })
        ->get(['id', 'nama']);

        return view('dashboard.educations.edit', compact('education', 'dataPendidik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestRiwayatPendidikanFormalPendidik $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $education = RiwayatPendidikanFormalPendidik::findOrFail($id);

        $education->update($validated);

        return redirect(route('educations.index'))->with('success', 'Data Riwayat Pendidikan Pendidik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = RiwayatPendidikanFormalPendidik::findOrFail($id);
        $education->delete();

        return redirect(route('educations.index'))->with('success', 'Data Riwayat Pendidikan Pendidik berhasil dihapus.');
    }
}
