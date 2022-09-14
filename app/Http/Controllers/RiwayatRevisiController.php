<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatRevisi;
use App\Models\rkakl;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\rab_akun;
use App\Models\rab_detail;
use App\Models\rab_detail_rinci;
use App\Models\kegiatan;
use App\Models\rab_sub;
use App\Models\rab_komponen;
use App\Models\rab_kekro;
use App\Models\rab_ro;
class RiwayatRevisiController extends Controller
{
    public function destroy($id)
    {
        $data = RiwayatRevisi::findorfail($id);
        if ($data == null) {
            return 'fail';
        }
        rab_kekro::where('id_rkakl',$data->id_rkakl)->where('id_revisi',$id)->delete();
        rab_ro::where('id_rkakl',$data->id_rkakl)->where('id_revisi',$id)->delete();
        rab_komponen::where('id_rkakl',$data->id_rkakl)->where('id_revisi',$id)->delete();
        rab_sub::where('id_rkakl',$data->id_rkakl)->where('id_revisi',$id)->delete();
        $akun = rab_akun::where('id_rkakl',$data->id_rkakl)->where('id_revisi',$id)->first();
        rab_detail::where('id_rkakl',$data->id_rkakl)->where('id_revisi',$id)->delete();
        if ($akun) {
            rab_detail_rinci::where('id_rab_akun',$akun->id ?? null)->delete();
            # code...
            $akun->delete();
        }

        $data->delete();
        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'max:255'],
            'tanggal' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $sebelumm = RiwayatRevisi::where('id_rkakl', $request->id)
            ->where('status_aktivasi', 1)
            ->first();
        // return $sebelumm;
        $data = RiwayatRevisi::where('id_rkakl', $request->id)->update([
            'status_draft' => 2,
            'status_aktivasi' => 2,
        ]);
        $user = '';
        $user = RiwayatRevisi::create([
            'id_rkakl' => $request->id,
            'tahun' => $request->tahun_anggaran,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'status_draft' => 1,
            'status_aktivasi' => $request->status_aktivasi ?? 2,
            'anggaran' => 0,
            'realisasi' => 0,
            'sisa' => 0,
        ]);
        $data = rab_kekro::with('mRo.mkom.mSubnya.mAkun.mDetail')
            ->where('id_rkakl', $request->id)
            ->where('id_revisi', $sebelumm->id)
            ->get();

        $hrk = 0;
        foreach ($data as $kekro) {
            $rev_kekro = rab_kekro::create([
                'id_kegiatan' => $kekro->id_kegiatan,
                'id_kro' => $kekro->id_kro,
                'id_revisi' => $user->id,
                'id_rkakl' => $kekro->id_rkakl,
                'nama_kegiatan' => $kekro->nama_kegiatan,
                'nama_kro' => $kekro->nama_kro,
                'biaya' => $kekro->biaya,
            ]);
            foreach ($kekro->mRo as $key => $value) {
                $rev_ro = rab_ro::create([
                    'id_rab_kekro' => $rev_kekro->id,
                    'id_revisi' => $user->id,
                    'id_rkakl' => $value->id_rkakl,
                    'nama_ro' => $value->nama_ro,
                    'id_ro' => $value->id_ro,
                    'biaya' => $value->biaya,
                ]);
                foreach ($value->mkom as $key => $value) {
                    $rev_kom = rab_komponen::create([
                        'id_rab_ro' => $rev_ro->id,
                        'id_revisi' => $user->id,
                        'id_rkakl' => $value->id_rkakl,
                        'nama_komponen' => $value->nama_komponen,
                        'id_komponen' => $value->id_komponen,
                        'biaya' => $value->biaya,
                    ]);
                    foreach ($value->mSubnya as $key => $value) {
                        $rev_subkom = rab_sub::create([
                            'id_rab_komponen' => $rev_kom->id,
                            'id_revisi' => $user->id,
                            'id_rkakl' => $value->id_rkakl,
                            'nama_sub' => $value->nama_sub,
                            'kode_sub' => $value->kode_sub,
                            'id_sub' => $value->id_sub,
                            'biaya' => $value->biaya,
                        ]);
                    }
                    foreach ($value->mAkun as $key => $value) {
                        $rev_akun = rab_akun::create([
                            'id_rab_sub' => $rev_subkom->id,
                            'id_revisi' => $user->id,
                            'id_rkakl' => $value->id_rkakl,
                            'nama_akun' => $value->nama_akun,
                            'kode_akun' => $value->kode_akun,
                            'id_akun' => $value->id_akun,
                            'biaya' => $value->biaya,
                            'status_cabang' => $value->status_cabang,
                        ]);
                        if ($value->status_cabang == 0) {
                            foreach ($value->mDetail as $key => $value) {
                                $rev_detail = rab_detail::create([
                                    'id_rab_akun' => $rev_akun->id,
                                    'id_revisi' => $user->id,
                                    'id_rkakl' => $value->id_rkakl,
                                    'keterangan' => $value->keterangan,
                                    'volume' => $value->volume,
                                    'satuan' => $value->satuan,
                                    'hargasatuan' => $value->hargasatuan,
                                    'biaya' => $value->biaya,
                                ]);
                            }
                        }else{
                            $datacabang = rab_detail_rinci::with('mDetail')->where('id_rab_akun',$value->id)->get();
                            foreach ($datacabang as $key => $value) {
                                $rev_rinci = rab_detail_rinci::create([
                                    'id_rab_akun' => $rev_akun->id,
                                    'id_revisi' => $user->id,
                                    'keterangan' => $value->keterangan,
                                    'biaya' => $value->biaya,
                                ]);
                                foreach ($value->mDetail as $key => $value) {
                                    $rev_detail = rab_detail::create([
                                        'id_rab_akun' => $rev_akun->id,
                                        'id_revisi' => $user->id,
                                        'id_rkakl' => $value->id_rkakl,
                                        'id_cabang' => $value->id_cabang,
                                        'keterangan' => $value->keterangan,
                                        'volume' => $value->volume,
                                        'satuan' => $value->satuan,
                                        'hargasatuan' => $value->hargasatuan,
                                        'biaya' => $value->biaya,
                                    ]);
                                }
                            }

                        }
                    }
                }
            }
        }
        // if ($user) {
        //     return 'success';
        // }
    }
    public function getrevisi($id)
    {
        if (request()->ajax()) {
            return Datatables::of(RiwayatRevisi::where('id_rkakl', $id)->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn =
                        "      <ul class='list-inline mb-0'>";
            
                    if ($data->status_aktivasi == 2) {
                        # code...
                        $btn .= "<li class='list-inline-item'>
                         <button type='button'  onclick='aktivasirevisi(" .
                                 $dataj .
                                 ")'   class='btn btn-primary btn-sm btn-xs mb-1'> Aktifkan </button>
                         </li>";
                    }
               $btn .= "<li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'></i> </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='delrev(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash'></i>  </button>
                    </li>";

                    $btn .= '</ul>';
                    return $btn;
                })
                ->addColumn('thn_anggaran', function ($data) {
                    $btn = 'Tahun Anggaran ' . $data->tahun_anggaran;
                    return $btn;
                })
                ->addColumn('status_aktif', function ($data) {
                    if ($data->aktivasi == 1) {
                        $btn = '<button class="btn-sm btn-primary btn "> Aktif </button>';
                    } else {
                        $btn = '<button class="btn-sm btn-danger btn "> Non-Aktif </button>';
                    }
                    return $btn;
                })
                ->addColumn('statusdraftnya', function ($data) {
                    if ($data->status_draft == 1) {
                        $btn = '<button class="btn-sm btn-warning btn "> Draft </button>';
                    } else {
                        $btn = '<button class="btn-sm btn-success btn "> Fix </button>';
                    }
                    return $btn;
                })
                ->addColumn('ketarangannya', function ($data) {
                    if ($data->revici) {
                        $btn = $data->revici->keterangan;
                    } else {
                        $btn = '-';
                    }
                    return $btn; //
                })
                ->addColumn('namanya', function ($data) {
                    if ($data->revici) {
                        $btn = $data->revici->nama;
                    } else {
                        $btn = '-';
                    }
                    return $btn; //
                })
                ->addColumn('statusnya', function ($data) {
                    if ($data->status_aktivasi == 1) {
                        $btn = '<button class="btn-sm btn-success btn "> Aktif </button>';
                    } else {
                        $btn = '<button class="btn-sm btn-warning btn "> Non </button>';
                    }
                    return $btn; //
                })
                ->addColumn('tanggalnya', function ($data) {
                    $date = Carbon::parse($data->tanggal)->locale('id');

                    $btn = $date->settings(['formatFunction' => 'translatedFormat']);

                    return $btn; //
                })
                ->rawColumns(['aksi', 'status_aktif', 'statusnya', 'statusdraftnya', 'thn_anggaran', 'tanggalnya', 'ketarangannya', 'namanya'])
                ->make(true);
        }
    }
    public function poststatusrevisi(Request $request)
    {
        RiwayatRevisi::where('id_rkakl',$request->idrk)->where('status_aktivasi','1')->update(['status_aktivasi'=>2]);
        RiwayatRevisi::where('id',$request->id)->where('id_rkakl',$request->idrk)->update(['status_aktivasi' => 1]);
        return 'success';
    }
}
