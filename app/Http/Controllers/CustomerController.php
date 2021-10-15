<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Faker\Provider\Uuid;
use App\customerModel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $data_customer = customerModel::where('nama_customer','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(10);
        return view('transaksi.customer')->with('data_customer',$data_customer);
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
        $data = new customerModel();
        $data->id = $id;
        $data->nama_customer = $request->nama_customer;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->no_ktp = $request->no_ktp;
        $data->deskripsi = $request->deskripsi;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Tambahkan');

        return redirect()->route('customer')->with('success', 'Data Customer Berhasil Di Tambahkan...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hutang()
    {
        return view('kasir.hutang');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = customerModel::find($id);
        return view('transaksi.customer_edit', compact('data'));
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
        $data = customerModel::find($id);
        $data->nama_customer = $request->nama_customer;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->deskripsi = $request->deskripsi;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Ubah');

        return redirect()->route('customer')->with('success', 'Data Customer Berhasil Di Ubah...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customerModel::destroy($id);

        // Session::flash('alert', 'Data Berhasil Di Hapus');

        return redirect()->route('customer')->with('success', 'Data Customer Berhasil Di Hapus...!');
    }
}
