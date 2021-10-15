<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Session;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\File;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $data = User::where('name','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(5);
        return view('admin.pengaturan.akun')->with('data',$data);
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

        $id = Uuid::uuid(4);
        $data = new User();
        $data->id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->is_admin = $request->is_admin;
        $data->password = Hash::make($request['password']);
        $data->save();
        // User::create([
        //     'id' => $data->Uuid::uuid(4),
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'is_admin' => $data['is_admin'],
        //     'password' => Hash::make($data['password']),
        // ]);

        // Session::flash('alert', 'Data Berhasil Di Tambahkan');

        return redirect()->route('akun')->with('success', 'Data Akun Berhasil Di Tambahkan...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function foto(Request $request)
    {
        $data = new User();
        // cek gambar dari form
        if($request->hasFile('foto')){
            // memindahkan foto ke dalam folder public/images
            $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
            // menyimpan nama foto ke dalam database
            $data->foto = $request->file('foto')->getClientOriginalName();
        $data->save();
        }

        // Session::flash('alert', 'Data Berhasil Di Tambahkan');


        return redirect()->route('akun')->with('success', 'Data Akun Berhasil Di Ubah...!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun = User::find($id);
        $data = User::find($id);
        return view('admin.pengaturan.akun_edit',[
            'data' => $data,
        ])->with('akun', $akun);
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
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $password = $request->password;
        if ($password == '') {
            $data->password = $data->password;
        }else{
            $data->password = Hash::make($request->password);
        }
        // cek jika file gambar
        if($request->hasFile('foto')){
            // cek foto lama
            $gambar = User::where('id',$id)->first();
            // hapus foto yg lama
            File::delete('images/akun/'. $gambar->foto);
            // upload foto yg baru
            $request->file('foto')->move('images/akun/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
        }
        $data->save();
        // Session::flash('alert', 'Data Berhasil Di Ubah');


        return redirect()->route('akun')->with('success', 'Data Akun Berhasil Di Ubah...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        // Session::flash('alert', 'Data Berhasil Di Hapus');

        return redirect()->route('akun')->with('success', 'Data Akun Berhasil Di Hapus...!');
    }
    public function fototop($id){
        $data = DB::select('select foto from products where id = $id');

        return view('master_layout.theme_topbar', compact('data'));
    }
}
