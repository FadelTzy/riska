<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SifatPembayaran;
use App\Models\JenisPembayaran;
use App\Models\Spp;
use App\Models\Supplier;
use App\Models\Pejabat;
use App\Models\DasarPembayaran;
use App\Models\JenisDokumen;
use App\Models\CaraBayar;
use App\Models\Jenisspm;
use App\Models\SumberDana;
use App\Models\KewenanganPelaksanaan;
use App\Models\AsalPenerimaan;
use App\Models\akun_rkakl;
use App\Models\rkakl;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Setting;
use Yajra\DataTables\Facades\DataTables;
use App\Models\jenis_belanja;

class SppController extends Controller
{
    public function getsupplier($id)
    {
        $data = Supplier::where('id', $id)->first();
        return $data;
    }
    public function list()
    {
        if (request()->ajax()) {
            return Datatables::of(Spp::with('akunrk', 'dataakunrkakl.rab.kegiatanr')->get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <a type='button'  href='" . url('admin/spp/cetak/') . '/' . $data->id . "'   class='btn btn-primary btn-sm btn-xs mb-1'>Cetak </a>
                </li>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-sm btn-success btn-xs mb-1'>Edit </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-sm btn-xs mb-1'>Hapus </button>
                    </li>
               
                </ul>";
                return $btn;
            })->addColumn('nama_akunrk', function ($data) {
                $btn = $data->akunrk != null ? $data->akunrk->nama : '-';
                return $btn;
            })->addColumn('no_tglspk', function ($data) {
                $btn = 'No.DIPA' . $data->no_spk . $data->tgl_spk;
                return $btn;
            })->addColumn('wow', function ($data) {
                $btn = '';
                foreach ($data->dataakunrkakl as $key => $value) {
                    $btn .= $value->rab->kegiatanr->kode . '<br>';
                }
                return $btn;
            })->rawColumns(['aksi', 'nama_akunrk', 'wow', 'no_tglspk'])->make(true);
        }

        return view('admin.daftar');
    }
    public function cetakspm($id)
    {
        $data['arr'] = Spp::with('sp', 'dp', 'cb', 'js', 'jp', 'pejabat_pk', 'pejabat_pp', 'supplier', 'kp', 'dataakunrkakl.rab.kegiatanr', 'dataakunrkakl.rab.kror', 'dataakunrkakl.rab.ror', 'dataakunrkakl.rab.komponenr', 'dataakunrkakl.rab.akunr')->where('id', $id)->first();
        $data['profil'] = Setting::first();
        $data['rkakl'] = rkakl::with('datarab', 'datarab.datakro.dataakunrkakl', 'datarab.kegiatanr', 'datarab.kror')->where('aktivasi', 1)->first();
        // return $data['rkakl'];
        // return $data;
        // return view('pdf.testing', compact('data'));
        $pdf = Pdf::loadView('pdf.spm', $data);
        return $pdf->setPaper('a4', 'potrait')->download('spm.pdf');
    }
    public function cetaksp2d($id)
    {
        $data['arr'] = Spp::with('sp', 'dp', 'cb', 'js', 'jp', 'pejabat_pk', 'pejabat_pp', 'supplier', 'kp', 'dataakunrkakl.rab.kegiatanr', 'dataakunrkakl.rab.kror', 'dataakunrkakl.rab.ror', 'dataakunrkakl.rab.komponenr', 'dataakunrkakl.rab.akunr')->where('id', $id)->first();
        $data['profil'] = Setting::first();
        $data['rkakl'] = rkakl::with('datarab', 'datarab.datakro.dataakunrkakl', 'datarab.kegiatanr', 'datarab.kror')->where('aktivasi', 1)->first();
        // return $data['rkakl'];
        // return $data;
        // return view('pdf.testing', compact('data'));
        $pdf = Pdf::loadView('pdf.sp2d', $data);
        return $pdf->setPaper('a4', 'potrait')->download('spm.pdf');
    }
    public function cetakdokumen($id)
    {
        $data['arr'] = Spp::with('sp', 'jb', 'jp', 'pejabat_pk', 'pejabat_pp', 'supplier', 'kp', 'dataakunrkakl.rab.kegiatanr', 'dataakunrkakl.rab.kror', 'dataakunrkakl.rab.ror', 'dataakunrkakl.rab.komponenr', 'dataakunrkakl.rab.akunr')->where('id', $id)->first();
        $data['profil'] = Setting::first();
        $data['rkakl'] = rkakl::with('datarab', 'datarab.datakro.dataakunrkakl', 'datarab.kegiatanr', 'datarab.kror')->where('aktivasi', 1)->first();
        // return $data['rkakl'];
        // return $data;
        // return view('pdf.testing', compact('data'));
        $pdf = Pdf::loadView('pdf.testing', $data);
        return $pdf->setPaper('a4', 'potrait')->download('Download.pdf');
    }
    public function index()
    {
        $datark = rkakl::with('datarab', 'datarab.kegiatanr', 'datarab.kror')->where('aktivasi', 1)->first();
        $SP = SifatPembayaran::all();
        $JP = JenisPembayaran::all();
        $jb = jenis_belanja::all();
        $supplier = Supplier::all();
        $pejabat = Pejabat::all();
        $dasar_pembayaran = DasarPembayaran::all();
        $jenis_dokumen = JenisDokumen::all();
        $cara_bayar = CaraBayar::all();
        $jenis_spm = Jenisspm::all();
        $sumber_dana = SumberDana::all();
        $kewenangan_pelaksanaan = KewenanganPelaksanaan::all();
        $asal_penerimaan = AsalPenerimaan::all();
        $tahun = date('Y');
        $totalspptahun  = Spp::where('tahun', $tahun)->count();
        $totalspptahun += 1;
        return view('admin.spp', compact('SP', 'datark', 'JP', 'jb', 'totalspptahun', 'supplier', 'pejabat', 'jenis_dokumen', 'dasar_pembayaran', 'cara_bayar', 'jenis_spm', 'sumber_dana', 'kewenangan_pelaksanaan', 'asal_penerimaan'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sifat_pembayaran' => ['required', 'string'],
            'jenis_pembayaran' => ['required', 'string'],
            'id_rkakl' => ['required', 'string'],
            'supplier' => ['required', 'string'],
            'keperluan' => ['required', 'string'],
            'nomor' => ['required', 'string'],
            'tanggal' => ['required', 'string'],
            // 'nilai_spk' => ['required', 'string'],
            // 'tahun' => ['required', 'string'],
            'jenis_belanja' => ['required', 'string'],
            'pembuat_komitmen' => ['required', 'string'],
            'penguji_penerbit' => ['required', 'string'],
            'kewenangan_pelaksanaan' => ['required', 'string'],
            'sumber_dana' => ['required', 'string'],
            'asal_penerimaan' => ['required', 'string'],
            'cara_bayar' => ['required', 'string'],
            'dasar_pembayaran' => ['required', 'string'],
            'jml_pembayaran' => ['required', 'string'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $terbilang = terbilang($request->jumlah);
        $user = Spp::create([
            'id_akun' => 0,
            'id_sifat_pembayaran' => $request->sifat_pembayaran,
            'id_rkakl' => $request->id_rkakl,
            'id_jenis_pembayaran' => $request->jenis_pembayaran,
            'jml_pembayaran' => $request->jumlah,
            'terbilang' => $terbilang,
            'id_supplier' => $request->supplier,
            'keperluan' => $request->keperluan,
            'no_spk' => $request->nomor,
            'tgl_spk' => $request->tanggal,
            'nilai_spk' => 1,
            'tahun' => 2022,
            'id_jenis_belanja' => $request->jenis_belanja,
            'pembuat_komitmen' => $request->p_komitmen,
            'penguji_penerbit' => $request->p_spp,
            'id_kp' => $request->kewenangan_pelaksanaan,
            'id_sumber_dana' => $request->sumber_dana,
            'id_asal_penerimaan' => $request->asal_penerimaan,
            'id_jenis_spm' => $request->jenis_spm,
            'id_cara_bayar' => $request->cara_bayar,
            'id_dasar_pembayaran' => $request->dasar_pembayaran
        ]);
        foreach ($request->anggaran as $key => $value) {
            akun_rkakl::create([
                'id_spp' => $user->id,
                'id_rkakl' => $request->id_rkakl,
                'id_rab' => $request->rabnya[$key],
                'jumlah' => $value
            ]);
        }

        return ['success' => true, 'id' => $user->id];
    }
    public function cetak($id)
    {
        $data = Spp::where('id', $id)->first();
        return view('admin.cetak', compact('id'));
    }
}
