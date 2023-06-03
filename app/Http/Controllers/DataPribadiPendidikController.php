<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStoreOrUpdateDataPribadiPendidik;
use App\Models\Pendidik;
use Illuminate\Http\Request;

class DataPribadiPendidikController extends Controller
{
    public function update(Request $request, $pendidikId)
    {
        $pendidik = Pendidik::findOrFail($pendidikId);

        $payloadDataPendidik = $request->except('_token', '_method');


        $pendidik->dataPribadi()->updateOrCreate([
            'pendidik_id' => $pendidik->id,
        ], $payloadDataPendidik);

        return redirect()->route('educators.show', $pendidik->id)->with('success', 'Data pribadi pendidik berhasil diperbarui');
    }

    public function updateDataKontak(Request $request, $pendidikId)
    {
        $pendidik = Pendidik::findOrFail($pendidikId);

        $payloadDataKontak = $request->except('_token', '_method');

        $pendidik->dataKontak()->updateOrCreate([
            'pendidik_id' => $pendidik->id,
        ], $payloadDataKontak);

        return redirect()->route('educators.show', $pendidik->id)->with('success', 'Data kontak pendidik berhasil diperbarui');
    }
}
