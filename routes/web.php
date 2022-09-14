<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DasarPembayaranController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\CaraBayarController;
use App\Http\Controllers\JenisspmController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\SifatPembayaranController;
use App\Http\Controllers\SumberDanaController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\AsalPenerimaanController;
use App\Http\Controllers\KewenanganPelaksanaanController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KroController;
use App\Http\Controllers\RoController;
use App\Http\Controllers\KomponenController;
use App\Http\Controllers\SubkomponenController;
use App\Http\Controllers\RkaklController;
use App\Http\Controllers\RabController;
use App\Http\Controllers\JenisBelanjaController;
use App\Http\Controllers\rab;
use App\Http\Controllers\RiwayatRevisiController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('spmv2', [Admin::class, 'index1']);
Route::post('sanggar', [rab::class, 'sanggar'])->name('singgar');

Route::prefix('rkakl')->group(function () {
    Route::get('akun', [AkunController::class, 'indexv2'])->name('akun.indexv2');
    Route::get('kegiatan', [KegiatanController::class, 'indexv2'])->name('kegiatan.indexv2');

    Route::get('data-rkakl', [RkaklController::class, 'indexv2'])->name('rkakl.indexv2');
    Route::get('data-rkakl/revisi/{id}', [RiwayatRevisiController::class, 'getrevisi']);
    Route::post('data-rkakl/status-revisi', [RiwayatRevisiController::class, 'poststatusrevisi']);

    //kekro
    Route::get('data-rkakl/{kekro}', [rab::class, 'kekro']);
    Route::get('data-rkakl/{kekro}/{subkom}', [rab::class, 'subkom']);

    Route::post('data-rkakl/kekro', [rab::class, 'storekekro'])->name('kekro.store');

    //ro
    Route::post('data-rkakl/ro', [rab::class, 'storero'])->name('rabro.store');
    Route::delete('data-rkakl/ro/{id}', [rab::class, 'destroyro'])->name('rabro.destroy');

    //kompnen
    Route::post('data-rkakl/komponen', [rab::class, 'storekom'])->name('rabkom.store');
    Route::delete('data-rkakl/komponen/{id}', [rab::class, 'destroykom'])->name('rabkom.destroy');

    //subkompnen
    Route::post('data-rkakl/subkomponen', [rab::class, 'storesubkom'])->name('rabsubkom.store');
    Route::delete('data-rkakl/subkomponen/{id}', [rab::class, 'destroysubkom'])->name('rabsubkom.destroy');

    //akun
    Route::post('data-rkakl/jenis-belanja', [rab::class, 'storeakun'])->name('rabakun.store');
    Route::delete('data-rkakl/jenis-belanja/{id}', [rab::class, 'destroyakun'])->name('rabakun.destroy');

    //detail
    Route::post('data-rkakl/jenis-belanja/detail', [rab::class, 'storedetail'])->name('rabdetail.store');
    Route::delete('data-rkakl/jenis-belanja/detail/{id}', [rab::class, 'destroydetail'])->name('rabdetail.destroy');

    //cabang
    Route::post('data-rkakl/jenis-belanja/cabang', [rab::class, 'storecabang'])->name('rabcabang.store');
    Route::delete('data-rkakl/jenis-belanja/cabang/{id}', [rab::class, 'destroycabang'])->name('rabcabang.destroy');

    // Route::get('data-rkakl/{id}', [RkaklController::class, 'createv2']);
});

// Route::get('spmv2', function () {
//     return view('welcome1');
// });
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        //revisi
        Route::post('data-rkakl/revisi/', [RiwayatRevisiController::class, 'store'])->name('revisi.store');
        Route::delete('data-rkakl/revisi/{id}', [RiwayatRevisiController::class, 'destroy']);

        //Jenis Belanja
        Route::resource('jenis-belanja', JenisBelanjaController::class);
        //rab
        Route::post('/rkakl/rab', [RabController::class, 'store'])->name('rab.store');
        Route::post('/rkakl/rab/akun', [RabController::class, 'storejenisakun'])->name('rab.storejenisakun');
        Route::delete('/rkakl/rab/{id}', [RabController::class, 'destroy'])->name('rab.destroy');
        Route::post('/rkakl/rab/edit', [RabController::class, 'update'])->name('rab.update');
        //rkakl
        Route::get('/rkakl-check/{id}', [RkaklController::class, 'check'])->name('rkakl.check');
        Route::get('/rkakl', [RkaklController::class, 'index'])->name('rkakl.index');
        Route::get('/rkakl/{id}', [RkaklController::class, 'create']);
        Route::post('/rkakl', [RkaklController::class, 'store'])->name('rkakl.store');
        Route::delete('/rkakl/{id}', [RkaklController::class, 'destroy'])->name('rkakl.destroy');
        Route::post('/rkakl/edit', [RkaklController::class, 'update'])->name('rkakl.update');
        //akun
        Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
        Route::post('/akun', [AkunController::class, 'store'])->name('akun.store');
        Route::delete('/akun/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');
        Route::post('/akun/edit', [AkunController::class, 'update'])->name('akun.update');

        //kegiatan
        Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
        Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
        Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
        Route::post('/kegiatan/edit', [KegiatanController::class, 'update'])->name('kegiatan.update');
        //kegiatan
        Route::get('/kro', [KroController::class, 'index'])->name('kro.index');
        Route::post('/kro', [KroController::class, 'store'])->name('kro.store');
        Route::delete('/kro/{id}', [KroController::class, 'destroy'])->name('kro.destroy');
        Route::post('/kro/edit', [KroController::class, 'update'])->name('kro.update');
        //ro
        Route::get('/ro', [RoController::class, 'index'])->name('ro.index');
        Route::post('/ro', [RoController::class, 'store'])->name('ro.store');
        Route::delete('/ro/{id}', [RoController::class, 'destroy'])->name('ro.destroy');
        Route::post('/ro/edit', [RoController::class, 'update'])->name('ro.update');
        //komponen
        Route::get('/komponen', [KomponenController::class, 'index'])->name('komponen.index');
        Route::post('/komponen', [KomponenController::class, 'store'])->name('komponen.store');
        Route::delete('/komponen/{id}', [KomponenController::class, 'destroy'])->name('komponen.destroy');
        Route::post('/komponen/edit', [KomponenController::class, 'update'])->name('komponen.update');
        //subkomponen
        Route::get('/subkomponen', [SubkomponenController::class, 'index'])->name('subkomponen.index');
        Route::post('/subkomponen', [SubkomponenController::class, 'store'])->name('subkomponen.store');
        Route::delete('/subkomponen/{id}', [SubkomponenController::class, 'destroy'])->name('subkomponen.destroy');
        Route::post('/subkomponen/edit', [SubkomponenController::class, 'update'])->name('subkomponen.update');
        //SPM
        Route::get('/getsupplier/{id}', [SppController::class, 'getsupplier']);

        Route::get('/spp', [SppController::class, 'index'])->name('spp.index');
        Route::get('/daftar', [SppController::class, 'list'])->name('spp.list');

        Route::post('/spp', [SppController::class, 'store'])->name('spp.store');
        Route::get('/spp/cetak/{id}', [SppController::class, 'cetak'])->name('spp.cetak');
        Route::get('/spp/{id}', [SppController::class, 'cetakdokumen']);
        Route::get('/spm/{id}', [SppController::class, 'cetakspm']);
        Route::get('/sp2d/{id}', [SppController::class, 'cetaksp2d']);

        Route::delete('/spp/{id}', [SppController::class, 'destroy'])->name('spp.destroy');
        Route::post('/spp/edit', [SppController::class, 'update'])->name('spp.update');
        //Kewenangan
        Route::get('/kewenangan-pelaksanaan', [KewenanganPelaksanaanController::class, 'index'])->name('kw.index');
        Route::post('/kewenangan-pelaksanaan', [KewenanganPelaksanaanController::class, 'store'])->name('kw.store');
        Route::delete('/kewenangan-pelaksanaan/{id}', [KewenanganPelaksanaanController::class, 'destroy'])->name('kw.destroy');
        Route::post('/kewenangan-pelaksanaan/edit', [KewenanganPelaksanaanController::class, 'update'])->name('kw.update');
        //Asal Penerimaan
        Route::get('/asal-penerimaan', [AsalPenerimaanController::class, 'index'])->name('ap.index');
        Route::post('/asal-penerimaan', [AsalPenerimaanController::class, 'store'])->name('ap.store');
        Route::delete('/asal-penerimaan/{id}', [AsalPenerimaanController::class, 'destroy'])->name('ap.destroy');
        Route::post('/asal-penerimaan/edit', [AsalPenerimaanController::class, 'update'])->name('ap.update');
        //supplier
        Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
        Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
        Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
        Route::post('/supplier/edit', [SupplierController::class, 'update'])->name('supplier.update');
        //pejabat
        Route::get('/pejabat', [PejabatController::class, 'pejabat'])->name('pejabat.index');
        Route::post('/pejabat', [PejabatController::class, 'store'])->name('pejabat.store');
        Route::delete('/pejabat/{id}', [PejabatController::class, 'destroy'])->name('pejabat.destroy');
        Route::post('/pejabat/edit', [PejabatController::class, 'update'])->name('pejabat.update');
        //settiing
        Route::get('/setting', [SettingController::class, 'setting'])->name('setting.index');
        Route::post('/setting', [SettingController::class, 'store'])->name('setting.store');
        Route::delete('/setting/{id}', [SettingController::class, 'destroy'])->name('setting.destroy');
        Route::post('/setting/edit', [SettingController::class, 'update'])->name('setting.update');
        //dasar pembayaran
        Route::get('/dasar-pembayaran', [DasarPembayaranController::class, 'index'])->name('dp.index');
        Route::post('/dasar-pembayaran', [DasarPembayaranController::class, 'store'])->name('dp.store');
        Route::delete('/dasar-pembayaran/{id}', [DasarPembayaranController::class, 'destroy'])->name('dp.destroy');
        Route::post('/dasar-pembayaran/edit', [DasarPembayaranController::class, 'update'])->name('dp.update');
        //jenis dokumen
        Route::get('/jenis-dokumen', [JenisDokumenController::class, 'index'])->name('jd.index');
        Route::post('/jenis-dokumen', [JenisDokumenController::class, 'store'])->name('jd.store');
        Route::delete('/jenis-dokumen/{id}', [JenisDokumenController::class, 'destroy'])->name('jd.destroy');
        Route::post('/jenis-dokumen/edit', [JenisDokumenController::class, 'update'])->name('jd.update');
        //cara bayar
        Route::get('/cara-bayar', [CaraBayarController::class, 'index'])->name('cb.index');
        Route::post('/cara-bayar', [CaraBayarController::class, 'store'])->name('cb.store');
        Route::delete('/cara-bayar/{id}', [CaraBayarController::class, 'destroy'])->name('cb.destroy');
        Route::post('/cara-bayar/edit', [CaraBayarController::class, 'update'])->name('cb.update');
        //Jenis SPM
        Route::get('/jenis-spm', [JenisspmController::class, 'index'])->name('js.index');
        Route::post('/jenis-spm', [JenisspmController::class, 'store'])->name('js.store');
        Route::delete('/jenis-spm/{id}', [JenisspmController::class, 'destroy'])->name('js.destroy');
        Route::post('/jenis-spm/edit', [JenisspmController::class, 'update'])->name('js.update');
        //Jenis pembayaran
        Route::get('/jenis-pembayaran', [JenisPembayaranController::class, 'index'])->name('jp.index');
        Route::post('/jenis-pembayaran', [JenisPembayaranController::class, 'store'])->name('jp.store');
        Route::delete('/jenis-pembayaran/{id}', [JenisPembayaranController::class, 'destroy'])->name('jp.destroy');
        Route::post('/jenis-pembayaran/edit', [JenisPembayaranController::class, 'update'])->name('jp.update');
        //sifat pembayaran
        Route::get('/sifat-pembayaran', [SifatPembayaranController::class, 'index'])->name('sp.index');
        Route::post('/sifat-pembayaran', [SifatPembayaranController::class, 'store'])->name('sp.store');
        Route::delete('/sifat-pembayaran/{id}', [SifatPembayaranController::class, 'destroy'])->name('sp.destroy');
        Route::post('/sifat-pembayaran/edit', [SifatPembayaranController::class, 'update'])->name('sp.update');
        //Sumber dana
        Route::get('/sumber-dana', [SumberDanaController::class, 'index'])->name('sd.index');
        Route::post('/sumber-dana', [SumberDanaController::class, 'store'])->name('sd.store');
        Route::delete('/sumber-dana/{id}', [SumberDanaController::class, 'destroy'])->name('sd.destroy');
        Route::post('/sumber-dana/edit', [SumberDanaController::class, 'update'])->name('sd.update');
        Route::get('/', [Admin::class, 'index']);
        Route::get('dashboard', [Admin::class, 'index'])->name('admin.index');
    });
});
Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';
Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';
