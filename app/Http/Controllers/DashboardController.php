<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coa;
use App\Models\DetailPengajuan;
use App\Models\Pengajuan;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard = coa::sum('anggaran');
        $keluar = DetailPengajuan::where('status', 'aktif')->orWhere('status', 'lunas')->sum('biaya');
        $sisa = $dashboard - $keluar;
        $belum = DetailPengajuan::where('status', 'belum')->count();
        $aktif = DetailPengajuan::where('status', 'aktif')->count();
        $lunas = DetailPengajuan::where('status', 'lunas')->count();
        return view('dashboard', compact('sisa','belum','aktif','lunas'));
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
        //
    }
}
