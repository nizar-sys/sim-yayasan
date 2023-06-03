<?php

namespace App\Http\Controllers;

use App\Models\RiwayatSertifikatPendidik;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateRiwayatSertifikatPendidik;
use App\Models\Pendidik;

class RiwayatSertifikatPendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = RiwayatSertifikatPendidik::orderByDesc('id');
        $certificates = $certificates->paginate(50);

        return view('dashboard.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPendidik = Pendidik::orderByDesc('id')->get(['id', 'nama']);
        return view('dashboard.certificates.create', compact('dataPendidik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateRiwayatSertifikatPendidik $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $certificate = RiwayatSertifikatPendidik::create($validated);

        return redirect(route('certificates.index'))->with('success', 'Data Riwayat Sertifikasi Pendidik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RiwayatSertifikatPendidik::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate = RiwayatSertifikatPendidik::findOrFail($id);
        $dataPendidik = Pendidik::orderByDesc('id')->get(['id', 'nama']);

        return view('dashboard.certificates.edit', compact('certificate', 'dataPendidik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateRiwayatSertifikatPendidik $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $certificate = RiwayatSertifikatPendidik::findOrFail($id);

        $certificate->update($validated);

        return redirect(route('certificates.index'))->with('success', 'Data Riwayat Sertifikasi Pendidik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificate = RiwayatSertifikatPendidik::findOrFail($id);
        $certificate->delete();

        return redirect(route('certificates.index'))->with('success', 'Data Riwayat Sertifikasi Pendidik berhasil dihapus.');
    }
}
