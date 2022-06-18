<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SkalanilaiController;
use App\Http\Controllers\PmbController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if(Auth::check()){
		return view('admin/dashboard');
				
    }else{
        return view('admin/login');       
    }
});


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('/customLogin', [AuthController::class, 'customLogin'])->name('customLogin');
Route::post('/customRegistration', [AuthController::class, 'customRegistration'])->name('customRegistration');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::middleware(['auth'])->group(function () {
    Route::get('/kelas', function () {
        return view('admin/Ikelas');
    });
    Route::get('/nilai', function () {
        return view('admin/Inilai');
    });
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    });
	Route::get('/dashboard2', function () {
        return view('admin/dashboard2');
    });
    Route::get('/daftar_mahasiswa', function () {
        return view('admin/dmahasiswa');
    });
    // Route::get('/daftar_ruang', function () {
    //     return view('admin/druang');
    // });


    Route::get('/detail_mhs', function () {
        return view('admin/mahasiswa/d_mhs/dtl_mahasiswa');
    });
    Route::get('/d_akademik', function () {
        return view('admin/mahasiswa/d_akademi/d_akademi');
    });
    Route::get('/krs', function () {
        return view('admin/mahasiswa/krs');
    });
    Route::get('/akm', function () {
        return view('admin/mahasiswa/akm');
    });
    Route::get('/khs', function () {
        return view('admin/mahasiswa/khs');
    });
    Route::get('/bayar_mhs', function () {
        return view('admin/mahasiswa/bayar_mhs');
    });
    Route::get('/mk', function () {
        return view('admin/mahasiswa/d_akademi/d_akademi');
    });
    Route::get('/transkrip', function () {
        return view('admin/mahasiswa/d_akademi/Transkrip');
    });
    Route::get('/hasil_studi', function () {
        return view('admin/mahasiswa/d_akademi/HasilStudi');
    });
    Route::get('dmahasiswa', [MahasiswaController::class, 'index'])->name('dmahasiswa');
    Route::post('create-mhs', [MahasiswaController::class, 'store'])->name('create-mhs');
    Route::get('s-mhs/{id}', [MahasiswaController::class, 'show'])->name('s-mhs');
    Route::get('sa-mhs/{id}', [MahasiswaController::class, 'showakademi'])->name('sa-mhs');
    Route::get('st-mhs/{id}', [MahasiswaController::class, 'showtranskrip'])->name('st-mhs');
    Route::get('shs-mhs/{id}', [MahasiswaController::class, 'showhstudi'])->name('shs-mhs');
    Route::get('export-mhs', [MahasiswaController::class, 'mhsexport'])->name('export-mhs');
    Route::post('import-mhs', [MahasiswaController::class, 'mhsimport'])->name('import-mhs');
    Route::get('sd-mhs/{id}', [MahasiswaController::class, 'showdidik'])->name('sd-mhs');
    Route::get('so-mhs/{id}', [MahasiswaController::class, 'showortu'])->name('so-mhs');
	Route::put('edit-mhs/{id}', [MahasiswaController::class, 'storemhs'])->name('edit-mhs');
	Route::put('editsmt-mhs/{id}', [MahasiswaController::class, 'storesmtmhs'])->name('editsmt-mhs');
	
	Route::get('valkrs/{id}/{id2}', [MahasiswaController::class, 'showvalkrs'])->name('valkrs');
	Route::get('editstatuskrsy/{id}', [MahasiswaController::class, 'editstatuskrsy'])->name('editstatuskrsy');
	Route::get('editstatuskrsx/{id}', [MahasiswaController::class, 'editstatuskrsx'])->name('editstatuskrsx');
	

    Route::get('druang', [RuanganController::class, 'index'])->name('druang');
    Route::post('create-ruang', [RuanganController::class, 'store'])->name('create-ruang');
    Route::get('e-ruang/{id}', [RuanganController::class, 'edit'])->name('e-ruang');
    Route::post('update-ruang/{id}', [RuanganController::class, 'update'])->name('update-ruang');
    Route::get('delete-ruang/{id}', [RuanganController::class, 'destroy'])->name('delete-ruang');

    Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
    //Route::get('/{title}', [KelasController::class, 'index2'])->name('kelas2');
    Route::put('create-dosen/{id}', [KelasController::class, 'storedos'])->name('create-dosen');
    Route::get('showkelas/{id}', [KelasController::class, 'show'])->name('showkelas');
    Route::post('create-jadwal', [KelasController::class, 'store'])->name('create-jadwal');
    Route::post('create-filter', [KelasController::class, 'index3'])->name('create-filter');
	Route::delete('kelas/{id}', 'App\Http\Controllers\KelasController@destroyjadwal');

    Route::get('dmatkul', [MatkulController::class, 'index'])->name('dmatkul');
    Route::post('create-matkul', [MatkulController::class, 'store'])->name('create-matkul');
    Route::get('e-matkul/{id}', [MatkulController::class, 'edit'])->name('e-matkul');
    Route::post('update-matkul/{id}', [MatkulController::class, 'update'])->name('update-matkul');
    Route::get('delete-matkul/{id}', [MatkulController::class, 'destroy'])->name('delete-matkul');

    Route::get('dprodi', [ProdiController::class, 'index'])->name('dprodi');
    Route::post('create-prodi', [ProdiController::class, 'store'])->name('create-prodi');
    Route::get('e-prodi/{id}', [ProdiController::class, 'edit'])->name('e-prodi');
    Route::post('update-prodi/{id}', [ProdiController::class, 'update'])->name('update-prodi');
    Route::get('delete-prodi/{id}', [ProdiController::class, 'destroy'])->name('delete-prodi');

    Route::get('kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::post('create-kurikulum', [KurikulumController::class, 'store'])->name('create-kurikulum');
    Route::get('e-kurikulum/{id}', [KurikulumController::class, 'edit'])->name('e-kurikulum');
    Route::post('update-kurikulum/{id}', [KurikulumController::class, 'update'])->name('update-kurikulum');
    Route::get('delete-kurikulum/{id}', [KurikulumController::class, 'destroy'])->name('delete-kurikulum');
    Route::get('s-kurikulum/{id}/{id2}', [KurikulumController::class, 'show'])->name('s-kurikulum');
    Route::post('create-kmatkul', [KurikulumController::class, 'inputmatkul'])->name('create-kmatkul');
    Route::get('delete-kmatkul/{id}', [KurikulumController::class, 'des_kmatkul'])->name('delete-kmatkul');

    Route::get('periode', [PeriodeController::class, 'index'])->name('periode');
    Route::post('create-periode', [PeriodeController::class, 'store'])->name('create-periode');
    Route::get('e-periode/{id}', [PeriodeController::class, 'edit'])->name('e-periode');
    Route::post('update-periode/{id}', [PeriodeController::class, 'update'])->name('update-periode');
    Route::get('delete-periode/{id}', [PeriodeController::class, 'destroy'])->name('delete-periode');

    Route::get('skalan', [SkalanilaiController::class, 'index'])->name('skalan');
    Route::post('create-skalan', [SkalanilaiController::class, 'store'])->name('create-skalan');
    Route::get('e-skalan/{id}', [SkalanilaiController::class, 'edit'])->name('e-skalan');
    Route::post('update-skalan/{id}', [SkalanilaiController::class, 'update'])->name('update-skalan');
    Route::get('delete-skalan/{id}', [SkalanilaiController::class, 'destroy'])->name('delete-skalan');
	
	Route::get('pmban', [PmbController::class, 'index'])->name('pmban');
	Route::put('create-pmban/{id}', [PmbController::class, 'storepmb'])->name('create-pmban');
    Route::get('e-pmban/{id}', [PmbController::class, 'edit'])->name('e-pmban');
    Route::post('update-pmban/{id}', [PmbController::class, 'update'])->name('update-pmban');
    Route::get('delete-pmban/{id}', [PmbController::class, 'destroy'])->name('delete-pmban');
	
	Route::get('statustrx', [StatusController::class, 'index'])->name('statustrx');
	Route::post('create-trx', [StatusController::class, 'storetrx'])->name('create-trx');
    Route::get('e-trx/{id}', [StatusController::class, 'edit'])->name('e-trx');
    Route::put('update-trx/{id}', [StatusController::class, 'update'])->name('update-trx');
    Route::get('delete-trx/{id}', [StatusController::class, 'destroy'])->name('delete-trx');

    Route::get('dosen', [DosenController::class, 'index'])->name('dosen');
    Route::post('create-dosen', [DosenController::class, 'store'])->name('create-dosen');
    Route::get('e-dosen/{id}', [DosenController::class, 'edit'])->name('e-dosen');
    Route::post('update-dosen/{id}', [DosenController::class, 'update'])->name('update-dosen');
    Route::get('delete-dosen/{id}', [DosenController::class, 'destroy'])->name('delete-dosen');
	
	Route::get('berita', [BeritaController::class, 'index'])->name('berita');
    Route::post('create-berita', [BeritaController::class, 'store'])->name('create-berita');
    Route::get('e-berita/{id}', [BeritaController::class, 'edit'])->name('e-berita');
    Route::post('update-berita/{id}', [BeritaController::class, 'update'])->name('update-berita');
    Route::get('delete-berita/{id}', [BeritaController::class, 'destroy'])->name('delete-berita');

    Route::get('nilai', [NilaiController::class, 'index'])->name('nilai');
    Route::get('s_nilai/{id}', [NilaiController::class, 'show'])->name('s_nilai');
    Route::get('e-nilai/{id}', [NilaiController::class, 'edit'])->name('e-nilai');
    Route::post('update-nilai/{id}', [NilaiController::class, 'update'])->name('update-nilai');
	
	
});
 