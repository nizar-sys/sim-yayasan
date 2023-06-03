<?php

namespace App\Http\Controllers;

use App\Models\ContactStudent;
use Illuminate\Http\Request;
use App\Http\Requests\RequestContactStudents;
use Illuminate\Support\Facades\Hash;

class ContactStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactStudent::orderByDesc('id');
        $contacts = $contacts->paginate(50);

        return view('dashboard.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestContactStudents $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $user = ContactStudent::create($validated);

        return redirect(route('contacts.index'))->with('success', 'Data kontak siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ContactStudent::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = ContactStudent::findOrFail($id);

        return view('dashboard.contacts.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestContactStudents $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $user = ContactStudent::findOrFail($id);

        $user->update($validated);

        return redirect(route('contacts.index'))->with('success', 'Data kontak siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = ContactStudent::findOrFail($id);
        $user->delete();

        return redirect(route('contacts.index'))->with('success', 'Data kontak siswa berhasil dihapus.');
    }
}
