<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePengaduanRequest;
use App\Http\Requests\UpdatePengaduanRequest;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::latest()->paginate(10);
        $per_page = 10;
        $search_name = "";
        return view('admin.user.user',compact('data','per_page','search_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'nama_petugas' => 'required',
            'telp' => 'required',
            'role' =>  'required',
            'roleUnit' =>  'required',
        ]);

        User::create([
            'name' => $request->nama_petugas,
            'username' => $request->nama_petugas,
            'password' =>  Hash::make($request->nama_petugas),
            'role' => $request->role,
        ]);
        
        $id = User::select('id')->where('username',$request->nama_petugas)->first();
        Petugas::create([
            'user_id' => $id->id,
            'nama_petugas' => $request->nama_petugas,
            'telp' => $request->telp,
            'roleUnit' => $request->roleUnit,
        ]);

        return redirect('user')->with('message','succses');
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
