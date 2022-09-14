<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\komponen;
use App\Models\kegiatan;
use App\Models\ro;
use App\Models\subkomponen;

class KomponenController extends Controller
{
    public function update(Request $request)
    {
        $data = komponen::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'kode' => ['required', 'string', 'max:255'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }


        $data->nama = $request->nama;
        $data->kode = $request->kode;


        $data->save();

        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255'],
            'id' => ['required', 'string', 'max:255'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $user = komponen::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'id_ro' => $request->id,

        ]);
        if ($user) {
            return 'success';
        }
    }
    public function index()
    {

        if (request()->ajax()) {
            return Datatables::of(komponen::get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "      <ul class='list-inline mb-0'>
                    <li class='list-inline-item'>
                    <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='bx bx-edit'> </i>  </button>
                    </li>
                        <li class='list-inline-item'>
                        <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='bx bx-trash-alt'> </i> </button>
                        </li>
                   
                    </ul>";
                return $btn;
            })->addColumn('kodenama', function ($data) {
                $btn = $data->kode . ' ' . $data->nama;
                return $btn;
            })->addColumn('kro', function ($data) {
                $dataj = json_encode($data);

                $btn = "<div class='d-flex justify-content-between'>
                    <p> Menambah data KRO </p>
                    <div>                <button  class='btn btn-sm btn-warning krolist'> <i class='bx bx-down-arrow-circle'> </i> </button>
                    <button type='button'  onclick='addkro(" . $dataj . ")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class='bx bx-plus-circle'> </i> </button>
    
                    </div>
                    </div>";
                return $btn;
            })->rawColumns(['aksi', 'kodenama', 'kro'])->make(true);
        }

        return view('admin.rkakl.kegiatan');
    }
    public function destroy($id)
    {
        $data = komponen::findorfail($id);
        subkomponen::where('id_komponen', $id)->delete();

        if ($data == null) {
            return 'fail';
        }
        $data->delete();
        return 'success';
    }
}
