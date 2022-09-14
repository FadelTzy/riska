<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\DasarPembayaran;
use Illuminate\Support\Facades\Validator;

class DasarPembayaranController extends Controller
{
    public function update(Request $request)
    {
        $data = DasarPembayaran::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'file' => ['mimes:pdf,doc,docx', 'max:2048'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/dp/' . $data->file;
            $bases =  $_SERVER['DOCUMENT_ROOT'];
            if ($data->file != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->file = null;
                } else {
                    return "gagal hapus foto";
                }
            }

            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/dp';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->file = $nama_file ?? null;
        }
        $data->nama = $request->nama;

        $data->save();

        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:pdf,doc,docx', 'max:2048'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/dp';
            $gmbr->move($tujuan_upload, $nama_file);
        }
        $user = DasarPembayaran::create([
            'nama' => $request->nama,
            'file' => $nama_file ?? null
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(DasarPembayaran::get())->addIndexColumn()->addColumn('aksi', function ($data) {
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
            })->addColumn('fileb', function ($data) {
                if ($data->file == null) {
                    $btn = 'File tidak tersedia';
                } else {
                    $btn = "<ul class='list-inline mb-0'>
                    <li class='list-inline-item'>
                    <a type='button' target='_blank' href='" . asset('gambar/dp/') . '/' . $data->file . "'  class='btn btn-sm btn-success btn-xs mb-1'>File </a>
                    </li>               
                    </ul>";
                }

                return $btn;
            })->rawColumns(['aksi', 'fileb'])->make(true);
        }

        return view('admin.ms.dp');
    }
    public function destroy($id)
    {
        $data = DasarPembayaran::findorfail($id);
        $path = 'gambar/dp/'  . $data->file;
        $bases =  $_SERVER['DOCUMENT_ROOT'];
        if ($data->file != null) {
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
