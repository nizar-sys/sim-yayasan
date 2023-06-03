<?php

namespace App\Http\Controllers;

use App\Models\Pendidik;
use Illuminate\Http\Request;

class DataKepegawaianPendidikController extends Controller
{
    public function update(Request $request, $pendidikId)
    {
        $pendidik = Pendidik::findOrFail($pendidikId);

        $payloadDataKepegawaian = $request->except('_token', '_method');


        $pendidik->dataKepegawaian()->updateOrCreate([
            'pendidik_id' => $pendidik->id,
        ], $payloadDataKepegawaian);

        return redirect()->route('educators.show', $pendidik->id)->with('success', 'Data kepegawaian pendidik berhasil diperbarui');
    }
}
