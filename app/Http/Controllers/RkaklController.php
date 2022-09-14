<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\rkakl;
use Illuminate\Support\Carbon;
use App\Models\rab;
use App\Models\kegiatan;
use App\Models\akun;
use App\Models\rab_akun;
use App\Models\rab_detail;
use App\Models\rab_detail_rinci;
use App\Models\rab_kekro;
use App\Models\rab_komponen;
use App\Models\rab_ro;
use App\Models\rab_sub;
use App\Models\RiwayatRevisi;

class RkaklController extends Controller
{
    public function check($id)
    {
        // rkakl::where('aktivasi', 1)->update(['aktivasi' => 0]);
        $data = rkakl::with('revici')->where('id', $id)->first();
        $revici = RiwayatRevisi::where('id',$data->revici->id)->first();
        if($revici->status_draft == 1){
            $revici->status_draft = 2;
        }else{
            $revici->status_draft = 1;
        }
        $revici->save();
        return 'success';
    }
    public function createv2($id)
    {
        // return 's';
        $kegiatan =   kegiatan::with('kroitem.roitem.komponenitem.subkomponenitem')->get();
        $akun = akun::get();
        if (request()->ajax()) {
            return Datatables::of(rab::with('kegiatanr', 'kror', 'ror', 'komponenr', 'subkomponenr','jenisAkun.akunr')->where('id_rkakl', $id)->get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);
                $btn = "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button  class='btn btn-sm btn-warning lihatakun'> <i class='fa fa-arrow-down'> </i> </button>
                </li>
                <li class='list-inline-item'>
                <button type='button'  onclick='addAkun(" . $dataj . ")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class='fa fa-plus-circle'> </i> </button>
                </li>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'></i> </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash'></i>  </button>
                    </li>
                    
               
                </ul>";
                return $btn;
            })->addColumn('thn_anggaran', function ($data) {

                $btn = "Tahun Anggaran " .  $data->tahun_anggaran;
                return $btn;
            })->addColumn('tanggal', function ($data) {
                $date = Carbon::parse($data->tgl_cetak)->locale('id');

                $date->settings(['formatFunction' => 'translatedFormat']);

                return $date->format('l, j F Y'); // 
            })->addColumn('kegiatan_nama', function ($data) {
                if ($data->kegiatanr == null) {
                    $date = '-';
                } else {
                    $date = $data->kegiatanr->kode . ' - ' . $data->kegiatanr->nama;
                }
                return $date;
            })->addColumn('kro_nama', function ($data) {
                if ($data->kror == null) {
                    $date = '-';
                } else {
                    $date = $data->kror->nama;
                }
                return $date;
            })->addColumn('ro_nama', function ($data) {
                if ($data->ror == null) {
                    $date = '-';
                } else {
                    $date = $data->ror->nama;
                }
                return $date;
            })->addColumn('komponen_nama', function ($data) {
                if ($data->komponenr == null) {
                    $date = '-';
                } else {
                    $date = $data->komponenr->nama;
                }
                return $date;
            })->addColumn('subkomponen_nama', function ($data) {
                if ($data->subkomponenr == null) {
                    $date = '-';
                } else {
                    $date = $data->subkomponenr->kode . ' - ' .  $data->subkomponenr->nama;
                }
                return $date;
            })->rawColumns(['aksi', 'subkomponen_nama', 'ro_nama', 'kro_nama', 'kegiatan_nama', 'komponen_nama', 'thn_anggaran', 'tanggal'])->make(true);
        }
        $data['page'] = "RAB";
        $data['judul'] = "RKA-KL";
        $data['kegiatan'] = $kegiatan;
        $data['akun'] = $akun;
        return view('spmv2.rab', $data);
    }
    public function create($id)
    {
        $kegiatan =   kegiatan::with('kroitem.roitem.komponenitem.subkomponenitem')->get();
        $akun = akun::get();
        if (request()->ajax()) {
            return Datatables::of(rab::with('kegiatanr', 'kror', 'ror', 'komponenr', 'subkomponenr')->where('id_rkakl', $id)->get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='bx bx-edit-alt'></i> </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='bx bx-trash'></i>  </button>
                    </li>
               
                </ul>";
                return $btn;
            })->addColumn('thn_anggaran', function ($data) {

                $btn = "Tahun Anggaran " .  $data->tahun_anggaran;
                return $btn;
            })->addColumn('tanggal', function ($data) {
                $date = Carbon::parse($data->tgl_cetak)->locale('id');

                $date->settings(['formatFunction' => 'translatedFormat']);

                return $date->format('l, j F Y'); // 
            })->addColumn('kegiatan_nama', function ($data) {
                if ($data->kegiatanr == null) {
                    $date = '-';
                } else {
                    $date = $data->kegiatanr->kode . ' - ' . $data->kegiatanr->nama;
                }
                return $date;
            })->addColumn('kro_nama', function ($data) {
                if ($data->kror == null) {
                    $date = '-';
                } else {
                    $date = $data->kror->nama;
                }
                return $date;
            })->addColumn('ro_nama', function ($data) {
                if ($data->ror == null) {
                    $date = '-';
                } else {
                    $date = $data->ror->nama;
                }


                return $date;
            })->addColumn('komponen_nama', function ($data) {
                if ($data->komponenr == null) {
                    $date = '-';
                } else {
                    $date = $data->komponenr->nama;
                }
                return $date;
            })->addColumn('akun_nama', function ($data) {
                if ($data->akunr == null) {
                    $date = '-';
                } else {
                    $date = $data->akunr->kode . ' - ' .  $data->akunr->nama;
                }
                return $date;
            })->rawColumns(['aksi', 'akun_nama', 'ro_nama', 'kro_nama', 'kegiatan_nama', 'komponen_nama', 'thn_anggaran', 'tanggal'])->make(true);
        }
        return view('admin.rkakl.rab', compact('kegiatan', 'akun'));
    }
    public function update(Request $request)
    {
        $data = rkakl::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'tanggal' => ['required',  'max:255'],

        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }


        $data->nama = $request->nama;
        $data->tgl_cetak = $request->tanggal;


        $data->save();

        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'tahun_anggaran' => ['required', 'max:255', 'unique:rkakl'],
            'tanggal' => ['required', 'max:255'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if ($request->status_aktivasi == 1) {
            rkakl::where('aktivasi', 1)->update(['aktivasi' => 0]);
        }
        $user = rkakl::create([
            'nama' => $request->nama,
            'tahun_anggaran' => $request->tahun_anggaran,
            'tgl' => $request->tanggal,
            'aktivasi' => $request->status_aktivasi,
            'keterangan' => $request->keterangan,
            'status_revisi' => 1,
            'status_draft' => 2,
            'anggaran' => 0,
            'realisasi' => 0,
            'sisa' => 0,
        ]);
        RiwayatRevisi::create([
            'id_rkakl' => $user->id,
            'tahun' => $request->tahun_anggaran,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'status_draft' =>1,
            'status_aktivasi' => 1,
            'anggaran' => 0,
            'realisasi' => 0,
            'sisa' => 0,

        ]);
        if ($user) {
            return 'success';
        }
    }
    public function index()
    {

        if (request()->ajax()) {
            return Datatables::of(rkakl::get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffcheck(" . $data->id . ")'   class='btn btn-sm btn-primary btn-xs mb-1'><i class='bx bx-check'></i> </button>
                </li>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-sm btn-warning btn-xs mb-1'><i class='bx bx-copy-alt'></i> </button>
                </li>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='bx bx-edit-alt'></i> </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='bx bx-trash'></i>  </button>
                    </li>
                    <li class='list-inline-item'>
                    <a type='button'  href='" . url('admin/rkakl/' . $data->id) . "'  class='btn btn-secondary btn-sm btn-xs mb-1'><i class='bx bx-clipboard'></i>  </a>
                    </li>
                </ul>";
                return $btn;
            })->addColumn('thn_anggaran', function ($data) {

                $btn = "Tahun Anggaran " .  $data->tahun_anggaran;
                return $btn;
            })->addColumn('status_aktif', function ($data) {

                if ($data->aktivasi == 1) {
                    $btn = '<button class="btn-sm btn-primary btn "> Aktif </button>';
                } else {
                    $btn =  '<button class="btn-sm btn-danger btn "> Non-Aktif </button>';
                }
                return $btn;
            })->addColumn('tanggal', function ($data) {
                $date = Carbon::parse($data->tgl_cetak)->locale('id');

                $date->settings(['formatFunction' => 'translatedFormat']);

                return $date->format('l, j F Y'); // 
            })->rawColumns(['aksi', 'status_aktif', 'thn_anggaran', 'tanggal'])->make(true);
        }

        return view('admin.rkakl.rkakl');
    }
    public function indexv2()
    {

        if (request()->ajax()) {
            return Datatables::of(rkakl::with('revici')->get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "      <ul style='position: relative;' class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffcheck(" . $data->id . ")'   class='btn btn-sm btn-primary btn-xs mb-1'><i class='fa fa-check'></i> </button>
                </li>
                <li class='list-inline-item'>
          
                </li>
                </ul>";
                $btn = "  <button type='button' data-toggle='modal' onclick='staffcheck(" . $data->id . ")'   class='btn d-inline btn-sm btn-primary btn-xs mb-1'><i class='fa fa-check'></i> </button>";
                $btn .= "      <div  class='d-inline dropdown'>
                <button class='btn btn-primary btn-sm dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                  Aksi
                </button>
                <ul class='dropdown-menu' style='z-index: 99999;'  aria-labelledby='dropdownMenuButton1'>
                <li>  <a type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='dropdown-item mb-1'>Copy </a></li>

                <li> <a type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class=' mb-1 dropdown-item'>Edit</a></li>
                <li>  <a type='button'  onclick='staffdel(" . $data->id . ")'   class='mb-1 dropdown-item'>Hapus  </a></li>
                <li> <a type='button'  href='" . url('rkakl/data-rkakl/' . $data->id) . "'  class=' mb-1 dropdown-item'> RAB </a></li>
                <li>                    <a type='button'  onclick='revisi(" . $dataj. ")'   class=' mb-1 dropdown-item'> Revisi </a>
                </li>
                </ul>
                
                  
              </div>";
            //   $btn .= "";
                return $btn;
            })->addColumn('thn_anggaran', function ($data) {

                $btn = "Tahun Anggaran " .  $data->tahun_anggaran;
                return $btn;
            })->addColumn('status_aktif', function ($data) {

                if ($data->aktivasi == 1) {
                    $btn = '<button class="btn-sm btn-primary btn "> Aktif </button>';
                } else {
                    $btn =  '<button class="btn-sm btn-danger btn "> Non-Aktif </button>';
                }
                return $btn;
            })->addColumn('statusdraftnya', function ($data) {
            if ($data->revici) {
                if ($data->revici->status_draft == 1) {
                    $btn = '<button class="btn-sm btn-warning btn "> Draft </button>';
                } else {
                    $btn =  '<button class="btn-sm btn-success btn "> Fix </button>';
                }
            }else{
                $btn = '-';
            }
               
                return $btn;
            })->addColumn('tanggal', function ($data) {
                $date = Carbon::parse($data->tgl_cetak)->locale('id');

                $date->settings(['formatFunction' => 'translatedFormat']);

                return $date->format('l, j F Y'); // 
            })->
            addColumn('ketarangannya', function ($data) {

                if ($data->revici) {
                    $btn = $data->revici->keterangan;
                }else{
                    $btn = '-';
                }
                return $btn; // 
            })->addColumn('namanya', function ($data) {

                if ($data->revici) {
                    $btn = $data->revici->nama;
                }else{
                    $btn = '-';
                }
                return $btn; // 
            })->
            addColumn('tanggalnya', function ($data) {

                if ($data->revici) {
                    $date = Carbon::parse($data->tgl_cetak)->locale('id');

                  $btn =  $date->settings(['formatFunction' => 'translatedFormat']);
                }else{
                    $btn = '-';
                }
                return $btn; // 
            })->rawColumns(['aksi', 'status_aktif', 'statusdraftnya','thn_anggaran', 'tanggalnya','ketarangannya','namanya'])->make(true);
        }
        $data['page'] = "Data RKA-KL";
        $data['judul'] = "RKA-KL";

        return view('spmv2.data-rkakl',$data);
    }
    public function destroy($id)
    {
        $data = rkakl::findorfail($id);
        if ($data == null) {
            return 'fail';
        }
        rab_kekro::where('id_rkakl',$id)->delete();
        rab_ro::where('id_rkakl',$id)->delete();
        rab_komponen::where('id_rkakl',$id)->delete();
        rab_sub::where('id_rkakl',$id)->delete();
        $akun = rab_akun::where('id_rkakl',$id)->first();
        rab_detail::where('id_rkakl',$id)->delete();
        if ($akun) {
            rab_detail_rinci::where('id_rab_akun',$akun->id ?? null)->delete();
            # code...
            $akun->delete();
        }

        $data->delete();
        return 'success';
    }
}
