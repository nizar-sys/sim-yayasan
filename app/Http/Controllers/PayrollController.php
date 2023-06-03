<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;
use App\Http\Requests\RequestPayroll;
use App\Models\Pendidik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payrolls = Payroll::orderByDesc('id')
        ->when(Auth::user()->educator != null, function($query) {
            return $query->where('pendidik_id', Auth::user()->educator->id);
        })
        ->get();

        return view('dashboard.payrolls.index', compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $dataPendidik = Pendidik::orderBy('id')->get();

        // cari dataPendidik yang belum ada di tabel payroll bulan ini
        $dataPendidik = Pendidik::whereDoesntHave('payrolls', function ($query) {
            $query->whereMonth('tanggal', date('m'));
        })->orderBy('id')->get();

        return view('dashboard.payrolls.create', compact('dataPendidik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestPayroll $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $payroll = Payroll::create($validated);

        return redirect(route('payrolls.index'))->with('success', 'Data penggajian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Payroll::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payroll = Payroll::findOrFail($id);
        $dataPendidik = Pendidik::orderBy('id')->get();

        return view('dashboard.payrolls.edit', compact('payroll', 'dataPendidik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestPayroll $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $payroll = Payroll::findOrFail($id);

        $payroll->update($validated);

        return redirect(route('payrolls.index'))->with('success', 'Data penggajian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->delete();

        return redirect(route('payrolls.index'))->with('success', 'Data penggajian berhasil dihapus.');
    }
}
