<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\StorePengaduanRequest;
use App\Http\Requests\UpdatePengaduanRequest;
use Carbon\Carbon;
use File;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "petugas" && Auth::user()->dataPetugas->roleUnit == "verifikator" ){
            $data = Pengaduan::where('status','verifikasi')->latest()->paginate(10);
            $per_page = 10;
            $search_name = "";
            return view('admin.pengaduan.pengaduan',compact('data','per_page','search_name'));
        }
        elseif(Auth::user()->role == "petugas" && Auth::user()->dataPetugas->roleUnit == "pelaksana" ){
            $data = Pengaduan::where('status','terverifikasi')->orWhere('status','proses')->latest()->paginate(10);
            $per_page = 10;
            $search_name = "";
            return view('admin.pengaduan.pengaduan',compact('data','per_page','search_name'));
        }
        $data = Pengaduan::latest()->paginate(10);
        $per_page = 10;
        $search_name = "";
        return view('admin.pengaduan.pengaduan',compact('data','per_page','search_name'));
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
     * @param  \App\Http\Requests\StorePengaduanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengaduanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengaduanRequest  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengaduanRequest $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }

    public function pengaduanMasyarakat(){
        $data = Pengaduan::latest()->get();
        return view('landing.list_pengaduan',compact('data'));
    }

    public function formPengaduan(){
        $data = Categories::all();
        return view('landing.input_pengaduan',compact('data'));
    }

    public function landing(){
        $data = Pengaduan::latest();
        return view('landing.landing_page',compact('data'));
    }

    public function inputPengaduan(Request $request){
        $ValidatedData = $request->validate([
            'nik' =>'required',
            'isi_laporan' => 'required',
            'foto' => 'required',
            'categori_id' => 'required'
        ]);
        $path = public_path().'/image/pengaduan/';
        File::makeDirectory($path, $mode = 0777, true, true);
        $file = $request->file('foto');
        $nama_file = $request->judul."_".$file->getClientOriginalName();
        $file->move($path,$nama_file);
        
        Pengaduan::create([
            'nik' =>  $request->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $nama_file,
            'tgl_pengaduan' => Carbon::now(),
            'categori_id' => $request->categori_id,
            'status' => 'verifikasi',
            'like' => '0',
            'dislike' => '0',
            
        ]);

        return redirect('pengaduan-masyarakat')->with('message','succses');
    }

    public function terverifikasi($id){
        Pengaduan::where('id',$id)->update([
            'status' => 'terverifikasi'
        ]);

        return redirect('pengaduan');
    }

    public function tidakTerverivikasi($id){
        Pengaduan::where('id',$id)->update([
            'status' => 'tidak tervierifikasi'
        ]);

        return redirect('pengaduan');
    }

    public function prosesPengaduan($id){
        Pengaduan::where('id',$id)->update([
            'status' => 'proses'
        ]);

        return redirect('pengaduan');
    }

    public function selesaiPengaduan($id){
        Pengaduan::where('id',$id)->update([
            'status' => 'selesai'
        ]);

        return redirect('pengaduan');
    }
    public function cetak($id){
        $data = Pengaduan::where('id',$id)->first();
        return view('cetak',compact('data'));
    }
}
