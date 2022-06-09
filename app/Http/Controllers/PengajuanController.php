<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\DetailPengajuan;
use App\Models\Keuangan;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = DetailPengajuan::join('pengajuan', 'detail_pengajuan.id_pengajuan', '=', 'pengajuan.id')
            ->join('coa', 'detail_pengajuan.id_coa', '=', 'coa.id')->where('kegiatan', '!=', 'dummy')
            ->orderBy('detail_pengajuan.created_at','DESC')
            ->select(['detail_pengajuan.*', 'pengajuan.prodi', 'coa.id_coa', 'coa.nama_coa'])->paginate(5);
        return view('pengajuan', compact('pengajuan'));
    }

    public function indexadmin()
    {
        $pengajuan = Pengajuan::join('detail_pengajuan', 'pengajuan.id', '=', 'detail_pengajuan.id_pengajuan')
            ->join('coa', 'detail_pengajuan.id_coa', '=', 'coa.id')->where('status', '=', 'belum')
            ->orderBy('detail_pengajuan.created_at','DESC')
            ->select(['detail_pengajuan.*', 'pengajuan.jumlah_pengajuan', 'pengajuan.prodi', 'coa.id_coa', 'coa.nama_coa'])
            ->paginate(5);
        return view('pengajuanAdmin', compact('pengajuan'));
    }

    public function indexpencairan()
    {
        $pengajuan = Pengajuan::join('detail_pengajuan', 'pengajuan.id', '=', 'detail_pengajuan.id_pengajuan')
            ->join('coa', 'detail_pengajuan.id_coa', '=', 'coa.id')->where('status', '!=', NULL)->where('status', '!=', 'belum')
            ->orderBy('detail_pengajuan.created_at','DESC')
            ->select(['detail_pengajuan.*', 'pengajuan.jumlah_pengajuan', 'coa.id_coa', 'coa.nama_coa'])
            ->paginate(5);
        return view('pencairanDana', compact('pengajuan'));
    }

    public function aktifkan(Request $request, $id)
    {
        $pengajuan = DetailPengajuan::findorfail($id);
        $pengajuan->update(array('status' => 'Aktif'));
        $kredit = $pengajuan->biaya;
        Keuangan::create([
            'keperluan' => $pengajuan->kegiatan,
            'debit' => NULL,
            'kredit' => $kredit
        ]);
        return redirect('pengajuanadmin')->with('toast_success', 'Item diaktifkan!');
    }

    public function lunas(Request $request, $id)
    {
        $pengajuan = DetailPengajuan::findorfail($id);
        $pengajuan->update(array('status' => 'Lunas'));
        return redirect('pencairandana')->with('toast_success', 'Item sudah lunas!');
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
    public function show($id)
    {
        //
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
        
    }
}
