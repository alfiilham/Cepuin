<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Petugas::latest()->paginate(10);
        $per_page = 10;
        $search_name = "";
        return view('admin.petugas.petugas',compact('data','per_page','search_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petugas._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePetugasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetugasRequest $request)
    {
        $ValidatedData = $request->validate([
            'nama_petugas' => 'required',
            'telp' => 'required',
        ]);

        User::create([
            'name' => $request->nama_petugas,
            'username' => $request->nama_petugas,
            'password' =>  Hash::make($request->nama_petugas),
            'role' => 'petugas'
        ]);
        
        $id = User::select('id')->where('username',$request->nama_petugas)->first();
        Petugas::create([
            'user_id' => $id->id,
            'nama_petugas' => $request->nama_petugas,
            'telp' => $request->telp,
        ]);

        return redirect('petugas')->with('message','succses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetugasRequest  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetugasRequest $request, Petugas $petugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        //
    }
}
