<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Session;
use Faker\Provider\Uuid;
use Datatables;
use App\supplinerModel;

class SupplinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $data_suppliner = supplinerModel::where('nama_suppliner','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(5);
        return view('admin.produk.suppliner')->with('data_suppliner',$data_suppliner);
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
        $data = new supplinerModel();
        $data->id = $id;
        $data->nama_suppliner = $request->nama_suppliner;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Tambahkan');

        return redirect()->route('suppliner')->with('success', 'Data Supplier Berhasil Di Tambahkan...!');
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
        $data = supplinerModel::find($id);
        return view('admin.produk.suppliner_edit', compact('data'));
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
        $data = supplinerModel::find($id);
        $data->nama_suppliner = $request->nama_suppliner;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Ubah');

        return redirect()->route('suppliner')->with('success', 'Data Supplier Berhasil Di Ubah...!');
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
        supplinerModel::destroy($id);

        // Session::flash('alert', 'Data Berhasil Di Hapus');

        return redirect()->route('suppliner')->with('success','Data Supplier Berhasil Di Hapus...!');
    }
}
