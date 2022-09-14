<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\JenisDokumen;
use Illuminate\Support\Facades\Validator;
use App\Models\DasarPembayaran;

class JenisDokumenController extends Controller
{
    public function update(Request $request)
    {
        $data = JenisDokumen::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'id_dasaru' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'string', 'max:255'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }


        $data->nama = $request->nama;
        $data->desc = $request->desc;
        $data->tanggal = $request->tanggal;
        $data->id_dasar_pembayaran = $request->id_dasaru;

        $data->save();

        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'id_dasar' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'string', 'max:255'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $user = JenisDokumen::create([
            'nama' => $request->nama,
            'desc' => $request->desc,
            'tanggal' => $request->tanggal,
            'id_dasar_pembayaran' => $request->id_dasar,

        ]);
        if ($user) {
            return 'success';
        }
    }
    public function index()
    {
        $dp = DasarPembayaran::all();
        if (request()->ajax()) {
            return Datatables::of(JenisDokumen::with('dasarpembayaranr')->get())->addIndexColumn()->addColumn('aksi', function ($data) {
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
            })->addColumn('dp', function ($data) {
                if ($data->id_dasar_pembayaran == null) {
                    $btn = 'File tidak tersedia';
                } else {
                    $btn = "<ul class='list-inline mb-0'>
                    <li class='list-inline-item'>
                    <a type='button' target='_blank' href='" . asset('gambar/dp/') . '/' . $data->dasarpembayaranr->file . "'  class='btn btn-sm btn-success btn-xs mb-1'>File </a>
                    </li>               
                    </ul>";
                }

                return $btn;
            })->rawColumns(['aksi', 'dp'])->make(true);
        }

        return view('admin.ms.jd', compact('dp'));
    }
    public function destroy($id)
    {
        $data = JenisDokumen::findorfail($id);
        if ($data == null) {
            return 'fail';
        }
        $data->delete();
        return 'success';
    }
}
