<?php

namespace App\Http\Controllers;

use App\Models\Cetak;
use Illuminate\Http\Request;

class cetakController extends Controller
{
    public function cetak(Request $request)
    {
       

        if($request->has('dari_tgl')){
            $loans = Cetak::with('user','type')->whereBetWeen('tanggal_persetujuan',[request('dari_tgl'),
            request('sampai_tgl')])->get();
        }
        $pdf = PDF::loadView('cetak.loans', compact('loans'))->setPaper('a4', 'landscape');

        return $pdf->stream('laporan_pinjaman.pdf');
    }
}
