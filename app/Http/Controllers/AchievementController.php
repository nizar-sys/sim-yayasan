<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Requests\RequestAchievement;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = Achievement::orderByDesc('id');
        $achievements = $achievements->paginate(50);

        return view('dashboard.achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataSiswa = Siswa::orderByDesc('id')->get();
        return view('dashboard.achievements.create', compact('dataSiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestAchievement $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $achievement = Achievement::create($validated);

        return redirect(route('achievements.index'))->with('success', 'Data prestasi siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Achievement::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        $dataSiswa = Siswa::orderByDesc('id')->get();

        return view('dashboard.achievements.edit', compact('achievement', 'dataSiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestAchievement $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $achievement = Achievement::findOrFail($id);
        $achievement->update($validated);

        return redirect(route('achievements.index'))->with('success', 'Data prestasi siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();

        return redirect(route('achievements.index'))->with('success', 'Data prestasi siswa berhasil dihapus.');
    }
}
