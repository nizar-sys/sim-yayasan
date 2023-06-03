<?php

namespace App\Http\Controllers;

use App\Models\Pendidik;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdatePendidik;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educators = Pendidik::orderByDesc('id')
        ->when(Auth::user()->educator != null, function($query) {
            return $query->where('user_id', Auth::id());
        })
        ->get();

        return view('dashboard.educators.index', compact('educators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.educators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdatePendidik $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // 'educator' or 'student
            'email_verified_at' => now(),
            'remember_token' => null,
        ]);

        $user->educator()->updateOrCreate([
            'user_id' => $user->id,
        ], $validated);

        return redirect(route('educators.index'))->with('success', 'Pendidik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $educator = Pendidik::findOrFail($id);

        return view('dashboard.educators.show', compact('educator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educator = Pendidik::findOrFail($id);

        return view('dashboard.educators.edit', compact('educator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdatePendidik $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $payloadUpdatePendidik = [
            'name' => $request->nama,
            'email' => $request->email,
        ];

        $educator = Pendidik::findOrFail($id);
        $educator->user()->update($payloadUpdatePendidik);
        $educator->update($validated);

        return redirect(route('educators.index'))->with('success', 'Pendidik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educator = Pendidik::findOrFail($id);
        $user = $educator->user()->delete();
        $educator->delete();

        return redirect(route('educators.index'))->with('success', 'Pendidik berhasil dihapus.');
    }
}
