<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pejabat;
use Illuminate\Support\Facades\Validator;

class PejabatController extends Controller
{
    public function update(Request $request)
    {
        $data = Pejabat::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:2000'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/ttd/' . $data->ttd;
            $bases =  $_SERVER['DOCUMENT_ROOT'];
            if ($data->ttd != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->ttd = null;
                } else {
                    return "gagal hapus foto";
                }
            }

            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/ttd';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->ttd = $nama_file ?? null;
        }
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->jabatan = $request->jabatan;
        $data->save();

        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:2000'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/ttd';
            $gmbr->move($tujuan_upload, $nama_file);
        }
        $user = Pejabat::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'ttd' => $nama_file ?? NULL,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function pejabat()
    {
        if (request()->ajax()) {
            return Datatables::of(Pejabat::get())->addIndexColumn()->addColumn('aksi', function ($data) {
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

        return view('admin.ms.pejabat');
    }
    public function destroy($id)
    {
        $data = Pejabat::findorfail($id);
        $path = 'gambar/ttd/'  . $data->ttd;
        $bases =  $_SERVER['DOCUMENT_ROOT'];
        if ($data->ttd != null) {
            if (file_exists($bases . '/' . $path)) {
                unlink($bases . '/' . $path);
            } else {
                return "Gagal menghapus gambar";
            }
        }
        $data->delete();
        return 'success';
    }
}
