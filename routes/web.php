<?php

use App\Http\Controllers\Admin\AdminAlumniControllers;
use App\Http\Controllers\admin\AlumniController as AdminAlumniController;
use App\Http\Controllers\Admin\BidangKeahlianController;
use App\Http\Controllers\Admin\KonsentrasiKeahlianController;
use App\Http\Controllers\Admin\ProgramKeahlianController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\Admin\StatusAlumniController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\TracerKerjaController;
use App\Http\Controllers\Admin\TracerKuliahController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SosialiteController;
use App\Http\Controllers\Admin\TahunLulusController;
use App\Http\Controllers\AlumniToolsController;
use App\Http\Controllers\TracerkerjaalumniController;
use App\Http\Controllers\TracerkuliahalumniController;
use App\Http\Controllers\testimoniAlumniController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);


// Route untuk menuju halaman dashboard admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //Route untuk tahun-lulus
    Route::prefix('admin/tahun-lulus')->group(function () {
        Route::get('/', [TahunLulusController::class, 'index'])->name('tahun-lulus.index');
        Route::get('/create', [TahunLulusController::class, 'create'])->name('tahun-lulus.create');
        Route::post('/', [TahunLulusController::class, 'store'])->name('tahun-lulus.store');
        Route::get('/{id}/edit', [TahunLulusController::class, 'edit'])->name('tahun-lulus.edit');
        Route::put('/{tahunLulus}', [TahunLulusController::class, 'update'])->name('tahun-lulus.update');
        Route::delete('/{tahunLulus}', [TahunLulusController::class, 'destroy'])->name('tahun-lulus.destroy');
    });
    //Route untuk bidang-keahlian
    Route::prefix('admin/bidang')->group(function () {
        Route::get('/', [BidangKeahlianController::class, 'index'])->name('bidang.index');
        Route::get('/create', [BidangKeahlianController::class, 'create'])->name('bidang.create');
        Route::post('/', [BidangKeahlianController::class, 'store'])->name('bidang.store');
        Route::get('/{id}/edit', [BidangKeahlianController::class, 'edit'])->name('bidang.edit');
        Route::put('/{id}', [BidangKeahlianController::class, 'update'])->name('bidang.update');
        Route::delete('/{id}', [BidangKeahlianController::class, 'destroy'])->name('bidang.destroy');
    });
    //Route untuk Konsentrasi-keahlian
    Route::prefix('admin/konsentrasi')->group(function () {
        Route::get('/', [KonsentrasiKeahlianController::class, 'index'])->name('konsentrasi.index');
        Route::get('/create', [KonsentrasiKeahlianController::class, 'create'])->name('konsentrasi.create');
        Route::post('/', [KonsentrasiKeahlianController::class, 'store'])->name('konsentrasi.store');
        Route::get('/{id}/edit', [KonsentrasiKeahlianController::class, 'edit'])->name('konsentrasi.edit');
        Route::put('/{id}', [KonsentrasiKeahlianController::class, 'update'])->name('konsentrasi.update');
        Route::delete('/{id}', [KonsentrasiKeahlianController::class, 'destroy'])->name('konsentrasi.destroy');
    });    //Route untuk program-keahlian
    Route::prefix('admin/program')->group(function () {
        Route::get('/', [ProgramKeahlianController::class, 'index'])->name('program.index');
        Route::get('/create', [ProgramKeahlianController::class, 'create'])->name('program.create');
        Route::post('/', [ProgramKeahlianController::class, 'store'])->name('program.store');
        Route::get('/{id}/edit', [ProgramKeahlianController::class, 'edit'])->name('program.edit');
        Route::put('/{id}', [ProgramKeahlianController::class, 'update'])->name('program.update');
        Route::delete('/{id}', [ProgramKeahlianController::class, 'destroy'])->name('program.destroy');
    });    // Route untuk Sekolah
    Route::prefix('admin/sekolah')->group(function () {
        Route::get('/', [SekolahController::class, 'index'])->name('sekolah.index');
        Route::get('/create', [SekolahController::class, 'create'])->name('sekolah.create');
        Route::post('/', [SekolahController::class, 'store'])->name('sekolah.store');
        Route::get('/{id}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
        Route::put('/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
        Route::delete('/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');
    });
    //Route untuk Status-alumni
    Route::prefix('admin/')->group(function () {
        Route::resource('status-alumni', StatusAlumniController::class)
            ->names([
                'index' => 'status-alumni.index',
                'create' => 'status-alumni.create',
                'store' => 'status-alumni.store',
                'edit' => 'status-alumni.edit',
                'update' => 'status-alumni.update',
            ])
            ->parameters([
                'status-alumni' => 'status_alumni',
            ]);
    });

    Route::prefix('admin/Alumni')->group(function () {
        Route::get('/', [AdminAlumniController::class, 'index'])->name('admin.alumni.index');
        Route::get('/create', [AdminAlumniControllers::class, 'create'])->name('admin.alumni.create');
        Route::post('/alumni/store', [AdminAlumniControllers::class, 'store'])->name('admin.alumni.store');
        Route::get('detail/{id}', [AdminAlumniController::class, 'show'])->name('alumni.show');
        Route::delete('hapus    /{id}', [AdminAlumniController::class, 'destroy'])->name('alumni.destroy');
    });
    Route::prefix('admin/TracerKerja')->group(function () {
        Route::get('/', [TracerKerjaController::class, 'index'])->name('admin.TracerKerja.index');
        Route::delete('/{id}', [TracerKerjaController::class, 'destroy'])->name('TracerKerja.destroy');
    });
    Route::prefix('admin/TracerKuliah')->group(function () {
        Route::get('/', [TracerKuliahController::class, 'index'])->name('admin.TracerKuliah.index');
        Route::delete('/{id}', [TracerKuliahController::class, 'destroy'])->name('TracerKuliah.destroy');
    });
    Route::prefix('admin/Testimoni')->group(function () {
        Route::get('/', [TestimoniController::class, 'index'])->name('testimoni.index');
        Route::delete('/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');
    });
});
// Route untuk menuju halaman dashboard admin
Route::middleware(['auth', 'role:alumni'])->group(function () {
    Route::get('alumni/dashboard', [AlumniController::class, 'index'])->name('alumni.dashboard');

    // Route untuk menuju DataAlumni index
    Route::prefix('alumni/Dataalumni')->group(function () {
        Route::get('/index', [AlumniToolsController::class, 'index'])->name('alumni.Dataalumni.index');
        Route::get('/show', [AlumniToolsController::class, 'show'])->name('Dataalumni.show');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('alumni.profile.index');

    //Route untuk menuju TracerStudy create 
    Route::get('/alumni/search', [AlumniController::class, 'search'])->name('alumni.tracerstudy.search');
    Route::get('/alumni/fill/{id}', [AlumniController::class, 'fillData'])->name('alumni.fillData');
    Route::post('/alumni/fill/{id}', [AlumniController::class, 'storeFilledData'])->name('alumni.tracerstudy.storeFilledData');

    Route::get('/alumni/create', [AlumniController::class, 'create'])->name('tracerstudy.create');
    Route::post('/alumni', [AlumniController::class, 'store'])->name('alumni.store');

    //Route untuk menuju TracerKerja create 
    Route::get('/tracerkerja/create', [TracerkerjaalumniController::class, 'create'])->name('alumni.tracerkerja.create');
    Route::post('/tracerkerja', [TracerkerjaalumniController::class, 'store'])->name('tracerkerja.store');

    Route::get('/testimoni/create', [TestimoniAlumniController::class, 'create'])->name('testimoni.create');
    Route::post('/testimoni', [TestimoniALumniController::class, 'store'])->name('testimoni.store');
    Route::post('/destroy/{id}', [TestimoniALumniController::class, 'destroy'])->name('testimoni.destroy');

    //Route untuk menuju Tracerkuliah create 
    Route::get('/tracerkuliah/create', [TracerkuliahalumniController::class, 'create'])->name('alumni.tracerkuliah.create');
    Route::post('/tracerkuliah', [TracerkuliahalumniController::class, 'store'])->name('tracerkuliah.store');
    Route::get('/autocomplete/alumni', [TracerkuliahalumniController::class, 'autocomplete'])->name('autocomplete.alumni');



    // Route untuk edit dan update data masing-masing tipe
    Route::get('/profile/alumni/edit/{id}', [DataController::class, 'editAlumni'])->name('profile.alumni');
    Route::post('/profile/alumni/update/{id}', [DataController::class, 'updateAlumni'])->name('update.alumni');

    Route::get('/profile/kuliah/edit/{id}', [DataController::class, 'editKuliah'])->name('profile.kuliah');
    Route::post('/profile/kuliah/update/{id}', [DataController::class, 'updateKuliah'])->name('update.kuliah');

    Route::get('/profile/kerja/edit/{id}', [DataController::class, 'editKerja'])->name('profile.kerja');
    Route::post('/profile/kerja/update/{id}', [DataController::class, 'updateKerja'])->name('update.kerja');



});
// Route::controller(SosialiteController::class)->group(function () {

//     Route::get('auth/google', 'googleLogin')->name('auth.google');
//     Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google-callback');
// });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
