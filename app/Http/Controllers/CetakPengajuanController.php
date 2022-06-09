<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\DetailPengajuan;
use App\Models\Keuangan;
use PDF;

class CetakPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = Pengajuan::orderBy('created_at','DESC')
            ->select('pengajuan.*')
            ->where('jumlah_pengajuan', '>', 0)->paginate(5);
        return view('cetakpengajuan', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cetak($id)
    {
        $cetak = Pengajuan::all()
            ->where('id', '=', $id);
        $detail = DetailPengajuan::join('coa', 'detail_pengajuan.id_coa', '=', 'coa.id')
            ->get(['detail_pengajuan.*', 'coa.id_coa', 'coa.nama_coa', 'coa.anggaran', 'coa.realisasi_coa'])
            ->where('id_pengajuan', '=', $id);
        $pdfin = PDF::loadView('output.outputpengajuan', compact('cetak', 'detail'));
        $pdfin->setPaper('A4', 'portrait');
        return $pdfin->stream('pengajuan.pdf');
    }

    public function cetakkeuangan()
    {
        $cetak = Keuangan::SelectRaw('keuangan.*, SUM(IFNULL(debit,0) - IFNULL(kredit,0)) OVER (ORDER BY created_at ASC, id ASC) as saldo')
            ->orderBy('created_at', 'ASC')->where('keperluan','!=','dummy')->get();
        $no = 1;
        $pdfin = PDF::loadView('output.outputkeuangan', compact('cetak', 'no'));
        $pdfin->setPaper('A4', 'landscape');
        return $pdfin->stream('keuangan.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
