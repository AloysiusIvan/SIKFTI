<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coa;
use App\Models\Pengajuan;
use App\Models\DetailPengajuan;
use RealRashid\SweetAlert\Facades\Alert;

class DetailPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coaf = coa::where('prodi', '=', 'FTI')->get();
        $coat = coa::where('prodi', '=', 'TI')->get();
        $coas = coa::where('prodi', '=', 'SI')->get();
        return view('addpengajuanpage')->with('coaf', $coaf)->with('coat', $coat)->with('coas', $coas);

        $item = Pengajuan::all();
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
        $pengajuan = Pengajuan::create([
            'id_user'=>$request->id_user,
            'username'=>$request->username,
            'jumlah_pengajuan'=>0,
            'prodi'=>$request->prodi,
        ]);
        $id_pengajuan = $pengajuan->id;
        $data = $request->all();
        if(count($request->id_coa) > 0){
            for($i = 0 ; $i < count($request->id_coa) ; $i++){
                $data2 = array(
                    'id_pengajuan'=>$id_pengajuan,
                    'id_coa'=>$request->id_coa[$i],
                    'realisasi'=>0,
                    'kegiatan'=>$request->kegiatan[$i],
                    'status'=>"belum",
                    'biaya'=>$request->biaya[$i]
                );
                DetailPengajuan::create($data2);
            }
        }
        $jumlah_pengajuan = DetailPengajuan::where('id_pengajuan', $id_pengajuan)->sum('biaya');
        $jumlah = Pengajuan::findorfail($id_pengajuan);
        $jumlah->update(array('jumlah_pengajuan' => $jumlah_pengajuan));
        return redirect('pengajuan')->with('toast_success', 'Dana berhasil diajukan!');
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
        $detailpengajuan = DetailPengajuan::findorfail($id);
        $detailpengajuan->update($request->all());
        $id_pengajuan = $detailpengajuan->id_pengajuan;
        $jumlah_pengajuan = DetailPengajuan::where('id_pengajuan', $id_pengajuan)->sum('biaya');
        $jumlah = Pengajuan::findorfail($id_pengajuan);
        $jumlah->update(array('jumlah_pengajuan' => $jumlah_pengajuan));
        return redirect('pengajuan')->with('toast_success', 'Pengajuan berhasil diupdate!');
    }

    public function realisasi(Request $request, $id)
    {
        $realisasi = DetailPengajuan::findorfail($id);
        $id_coa = $realisasi->id_coa;
        $coa = coa::findorfail($id_coa);
        $realisasi->update($request->all());
        $sum = DetailPengajuan::where('id_coa',$coa->id)->sum('realisasi');
        if ($coa->realisasi_coa == NULL){
            $coa->update(array('realisasi_coa' => 0));
            $coa->update(array('realisasi_coa' => $sum));
        } else{
            $coa->update(array('realisasi_coa' => $sum));
        }
        return redirect('pencairandana')->with('toast_success', 'Realisasi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DetailPengajuan = DetailPengajuan::findorfail($id);
        $idpengajuan = $DetailPengajuan->id_pengajuan;
        if (DetailPengajuan::where('id_pengajuan', '=', $idpengajuan)->count() > 1){
            $DetailPengajuan->delete();
            $jumlah_pengajuan = DetailPengajuan::where('id_pengajuan', $idpengajuan)->sum('biaya');
            $jumlah = Pengajuan::findorfail($idpengajuan);
            $jumlah->update(array('jumlah_pengajuan' => $jumlah_pengajuan));
        }else{
            $delete = Pengajuan::findorfail($idpengajuan);
            $delete->delete();
        }
        return back()->with('toast_success', 'Pengajuan berhasil dihapus!');
    }
}
