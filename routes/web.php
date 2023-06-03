<?php

use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DataKepegawaianPendidikController;
use App\Http\Controllers\DataPenugasanPendidikController;
use App\Http\Controllers\DataPribadiPendidikController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\EducatorCarrierController;
use App\Http\Controllers\EducatorChildrenController;
use App\Http\Controllers\PendidikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatPendidikanFormalPendidikController;
use App\Http\Controllers\RiwayatSertifikatPendidikController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SiswaController;
use App\Models\RiwayatPendidikanFormalPendidik;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# ------ Unauthenticated routes ------ #
Route::get('/', [AuthenticatedSessionController::class, 'create']);
require __DIR__.'/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('home'); # dashboard
    Route::resource('users', UserController::class);

    Route::put('/educators/personal/{id}', [DataPribadiPendidikController::class, 'update'])->name('educators.personal.update');
    Route::put('/educators/staff/{id}', [DataKepegawaianPendidikController::class, 'update'])->name('educators.staff.update');
    Route::put('/educators/kontak/{id}', [DataPribadiPendidikController::class, 'updateDataKontak'])->name('educators.kontak.update');
    Route::resource('educators', PendidikController::class);

    Route::put('/students/parent/{id}', [SiswaController::class, 'updateDataOrtu'])->name('students.parent.update');
    Route::put('/students/kontak/{id}', [SiswaController::class, 'updateDataKontak'])->name('students.kontak.update');
    Route::put('/students/periodik/{id}', [SiswaController::class, 'updateDataPeriodik'])->name('students.periodik.update');
    Route::resource('students', SiswaController::class);
    Route::resource('achievements', AchievementController::class);

    Route::resource('assignments', DataPenugasanPendidikController::class);
    Route::resource('certificates', RiwayatSertifikatPendidikController::class);
    Route::resource('educations', RiwayatPendidikanFormalPendidikController::class);
    Route::resource('childrens', EducatorChildrenController::class);
    Route::resource('carriers', EducatorCarrierController::class);
});
