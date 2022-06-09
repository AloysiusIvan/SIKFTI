<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coa;
use App\Models\DetailPengajuan;
use App\Models\Pengajuan;
use App\Models\Keuangan;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class CoaController extends Controller
{
    public function index()
    {
        // $coa = coa::all();
        $coa = coa::join('detail_pengajuan', 'coa.id', '=', 'detail_pengajuan.id_coa')->orderBy('created_at', 'DESC')
            ->SelectRaw('coa.*, sum(IFNULL(realisasi,0)) as realisasi, (sum(IF(status!="belum", biaya, 0)) - sum(realisasi)) as belum, biaya')
            ->groupBy('coa.id')->paginate(5);
        return view('coa', compact('coa'));
    }

    public function store(Request $request)
    {
        $coa = coa::create([
            'id_coa'=>$request->id_coa,
            'nama_coa'=>$request->nama_coa,
            'ket_keg'=>$request->ket_keg,
            'tahun'=>$request->tahun,
            'anggaran'=>$request->anggaran,
            'prodi'=>$request->prodi,
        ]);
        $pengajuan = Pengajuan::create([
            'id_user' => auth()->user()->id,
            'username' => auth()->user()->name,
            'jumlah_pengajuan' => 0,
            'prodi' => $request->prodi,
        ]);
        DetailPengajuan::create([
            'id_pengajuan' => $pengajuan->id,
            'id_coa' => $coa->id,
            'realisasi' => 0,
            'kegiatan' => 'dummy',
            'biaya' => 0
        ]);
        
        Keuangan::create([
            'keperluan' => "Transfer Masuk FTI",
            'debit' => $coa->anggaran,
            'kredit' => NULL,
        ]);
        return redirect('coa')->with('toast_success', 'COA berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $coa = coa::findorfail($id);
        $waktu = $coa->created_at;
        $coa->update($request->all());
        $keuanganbaru = $coa->anggaran;
        DB::table('keuangan')->where('created_at', $waktu)->update(['debit' => $request->anggaran]);
        return redirect('coa')->with('toast_success', 'COA berhasil diupdate!');
    }

    public function delete($id)
    {
        $coa = coa::findorfail($id);
        $waktu = $coa->created_at;
        $coa->delete();
        DB::table('pengajuan')->where('created_at', $waktu)->delete();
        DB::table('keuangan')->where('created_at', $waktu)->delete();
        return back()->with('toast_success', 'COA berhasil dihapus!');
    }
}
