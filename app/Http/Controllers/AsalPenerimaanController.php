<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KewenanganPelaksanaan;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pejabat;
use App\Models\AsalPenerimaan;
use Illuminate\Support\Facades\Validator;

class AsalPenerimaanController extends Controller
{
    public function update(Request $request)
    {
        $data = AsalPenerimaan::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'deskripsi' => ['string', 'max:255'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }


        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;


        $data->save();

        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'deskripsi' => ['string', 'max:255'],


        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $user = AsalPenerimaan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,


        ]);
        if ($user) {
            return 'success';
        }
    }
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(AsalPenerimaan::get())->addIndexColumn()->addColumn('aksi', function ($data) {
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

        return view('admin.ms.ap');
    }
    public function destroy($id)
    {
        $data = AsalPenerimaan::findorfail($id);
        if ($data == null) {
            return 'fail';
        }
        $data->delete();
        return 'success';
    }
}
