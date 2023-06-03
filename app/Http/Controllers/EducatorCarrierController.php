<?php

namespace App\Http\Controllers;

use App\Models\EducatorCarrier;
use Illuminate\Http\Request;
use App\Http\Requests\RequestEducatorCarrier;
use App\Models\Pendidik;

class EducatorCarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carriers = EducatorCarrier::orderByDesc('id');
        $carriers = $carriers->paginate(50);

        return view('dashboard.carriers.index', compact('carriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPendidik = Pendidik::orderByDesc('id')->get(['id', 'nama']);
        return view('dashboard.carriers.create', compact('dataPendidik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestEducatorCarrier $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $carrier = EducatorCarrier::create($validated);

        return redirect(route('carriers.index'))->with('success', 'Data Riwayat Karir Pendidik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EducatorCarrier::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrier = EducatorCarrier::findOrFail($id);
        $dataPendidik = Pendidik::orderByDesc('id')->get(['id', 'nama']);

        return view('dashboard.carriers.edit', compact('carrier', 'dataPendidik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEducatorCarrier $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $carrier = EducatorCarrier::findOrFail($id);

        $carrier->update($validated);

        return redirect(route('carriers.index'))->with('success', 'Data Riwayat Karir Pendidik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrier = EducatorCarrier::findOrFail($id);
        $carrier->delete();

        return redirect(route('carriers.index'))->with('success', 'Data Riwayat Karir Pendidik berhasil dihapus.');
    }
}
