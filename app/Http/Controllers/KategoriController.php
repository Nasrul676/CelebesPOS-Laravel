<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategoriModel;
use Session;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\DB;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $data = kategoriModel::where('nama_kategori','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(5);

        return view('admin.produk.kategori')->with('data',$data);
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
        $data = new kategoriModel();
        $data->id = $id;
        $data->nama_kategori = $request->nama_kategori;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Tambahkan');

        return redirect()->route('kategori')->with('success', 'Data Kategori Berhasil Di Tambahkan...!');
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
        $data = kategoriModel::find($id);
        return view('admin.produk.kategori_edit', compact('data'));
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
        $data = kategoriModel::find($id);
        $data->nama_kategori = $request->nama_kategori;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Ubah');

        return redirect()->route('kategori')->with('success', 'Data Kategori Berhasil Di Ubah...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // kategoriModel::destroy($id);\
        $pegawai = kategoriModel::find($request->id)->delete();

            return redirect()->route('kategori')->with('success', 'Data Kategori Berhasil Di Hapus...!');
    }        
    
}
