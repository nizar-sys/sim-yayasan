<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateSiswa;
use App\Models\ParentStudent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Siswa::orderByDesc('id')
        ->when(Auth::user()->student != null, function($query) {
            return $query->where('user_id', Auth::id());
        })
        ->get();

        return view('dashboard.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateSiswa $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // 'student' or 'student
            'email_verified_at' => now(),
            'remember_token' => null,
        ]);

        $user->student()->updateOrCreate([
            'user_id' => $user->id,
        ], $validated);

        return redirect(route('students.index'))->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student =  Siswa::findOrFail($id);
        $ayahSiswa = ParentStudent::where('siswa_id', $id)->where('sebagai', 'ayah')->first();
        $ibuSiswa = ParentStudent::where('siswa_id', $id)->where('sebagai', 'ibu')->first();
        $waliSiswa = ParentStudent::where('siswa_id', $id)->where('sebagai', 'wali')->first();

        return view('dashboard.students.show', compact('student', 'ayahSiswa', 'ibuSiswa', 'waliSiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Siswa::findOrFail($id);

        return view('dashboard.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateSiswa $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $payloadUpdateUser = [
            'name' => $request->nama,
            'email' => $request->email,
        ];

        $student = Siswa::findOrFail($id);
        $student->user()->update($payloadUpdateUser);
        $student->update($validated);

        return redirect(route('students.index'))->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Siswa::findOrFail($id);
        $user = $student->user()->delete();
        $student->delete();

        return redirect(route('students.index'))->with('success', 'Siswa berhasil dihapus.');
    }

    public function updateDataOrtu(Request $request, $siswaId)
    {
        $siswa = Siswa::findOrFail($siswaId);

        $parent = ParentStudent::where('sebagai', $request->sebagai)->where('siswa_id', $siswa->id)->first();

        if (!$parent) {
            ParentStudent::create($request->all() + [
                'siswa_id' => $siswa->id,
            ]);
        }else{
            $parent->update($request->all());
        }

        return back()->with('success', 'Data orang tua berhasil diperbarui.');
    }

    public function updateDataKontak(Request $request, $siswaId)
    {
        $siswa = Siswa::findOrFail($siswaId);

        $siswa->dataKontak()->updateOrCreate([
            'siswa_id' => $siswaId
        ], $request->all());

        return back()->with('success', 'Kontak siswa berhasil diperbarui.');
    }

    public function updateDataPeriodik(Request $request, $siswaId)
    {
        $siswa = Siswa::findOrFail($siswaId);

        $siswa->dataPeriodik()->updateOrCreate([
            'siswa_id' => $siswaId
        ], $request->all());

        return back()->with('success', 'Data periodik siswa berhasil diperbarui.');
    }
}
