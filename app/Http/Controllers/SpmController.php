<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SifatPembayaran;
use App\Models\JenisPembayaran;

class SpmController extends Controller
{
    public function index()
    {
        $SP = SifatPembayaran::all();
        $JP = JenisPembayaran::all();

        return view('admin.spm', compact('SP', 'JP'));
    }
}
