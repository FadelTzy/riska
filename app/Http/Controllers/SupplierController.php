<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function update(Request $request)
    {
        $data = Supplier::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        // if (request()->file('file')) {
        //     $path = '/gambar/ttd/' . $data->ttd;
        //     $bases =  $_SERVER['DOCUMENT_ROOT'];
        //     if ($data->ttd != null) {
        //         if (file_exists($bases . '/' . $path)) {
        //             unlink($bases . '/' . $path);
        //             $data->ttd = null;
        //         } else {
        //             return "gagal hapus foto";
        //         }
        //     }

        //     $gmbr = request()->file('file');
        //     $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
        //     $tujuan_upload = 'gambar/ttd';
        //     $gmbr->move($tujuan_upload, $nama_file);

        //     $data->ttd = $nama_file ?? null;
        // }
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->bank = $request->bank;
        $data->nama_rek = $request->nama_rek;
        $data->no_rek = $request->nomor_rek;
        $data->npwp = $request->npwp;
        $data->bank_pusat = $request->bank_pusat;
        $data->kode_bank_pusat = $request->kode_bank_pusat;
        $data->swift = $request->swift;
        $data->tipe_sup = $request->tipe_sup;
        $data->telp = $request->telpon;
        $data->kode_negara = $request->kode_negara;
        $data->negara = $request->negara;
        $data->kode_pos = $request->kode_pos;
        $data->provinsi = $request->provinsi;
        $data->kota = $request->kota;
        $data->email = $request->tipe_sup;
        $data->save();

        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        // if (request()->file('file')) {
        //     $gmbr = request()->file('file');
        //     $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
        //     $tujuan_upload = 'gambar/ttd';
        //     $gmbr->move($tujuan_upload, $nama_file);
        // }
        $user = Supplier::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'bank' => $request->bank,
            'nama_rek' => $request->nama_rek,
            'no_rek' => $request->nomor_rek,
            'npwp' => $request->npwp,
            'bank_pusat' => $request->bank_pusat,
            'kode_bank_pusat' => $request->kode_bank_pusat,
            'swift' => $request->swift,
            'tipe_sup' => $request->tipe_sup,
            'telp' => $request->telpon,
            'kode_negara' => $request->kode_negara,
            'negara' => $request->negara,
            'kode_pos' => $request->kode_pos,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'email' => $request->tipe_sup,

        ]);
        if ($user) {
            return 'success';
        }
    }
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Supplier::get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-sm btn-success btn-xs mb-1'>Edit </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-sm btn-xs mb-1'>Hapus </button>
                    </li>
               
                </ul>";
                return $btn;
            })->rawColumns(['aksi'])->make(true);
        }

        return view('admin.ms.supplier');
    }
    public function destroy($id)
    {
        $data = Supplier::findorfail($id);
        // $path = 'gambar/ttd/'  . $data->ttd;
        // $bases =  $_SERVER['DOCUMENT_ROOT'];
        // if ($data->ttd != null) {
        //     if (file_exists($bases . '/' . $path)) {
        //         unlink($bases . '/' . $path);
        //     } else {
        //         return "Gagal menghapus gambar";
        //     }
        // }
        if ($data == null) {
            return 'fail';
        }
        $data->delete();
        return 'success';
    }
}
