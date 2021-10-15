<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stok_outModel;
use Session;
use Faker\Provider\Uuid;
use App\Product;
use Illuminate\Support\Facades\DB;

class StokOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $data = stok_outModel::where('nama_barang','like',"%".$cari."%")->orwhere('barcode','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(5);
        return view('admin.stok.stok_out')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_produk = DB::SELECT('select * from products');
        return view('admin.stok.stok_out_tambah')->with('data_produk', $data_produk);
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
        $stok_lama = $request->stok_barang;
        $id = $request->id;
        $stok_saat_ini = $request->jumlah_barang;

        $jumlah_stok = DB::table('products')->where(['id' => $id])
        ->update(['stok_barang' => $stok_lama - $stok_saat_ini]);

        $total = $stok_lama - $stok_saat_ini;
    
        $data = new stok_outModel();
        $data->id = $id;
        $data->total = $total;
        $data->id = $request->id;
        $data->barcode = $request->barcode;
        $data->nama_barang = $request->nama_produk;
        $data->jumlah_barang = $request->stok_barang;
        $data->jumlah_stok_out = $request->jumlah_barang;
        $data->keterangan = $request->keterangan;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Tambahkan');

        return redirect()->route('stok_out')->with('success', 'Data Stok Keluar Berhasil Di Tambahkan...!');
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
    public function destroy(Request $request, $id)
    {
        
        $data = stok_outModel::find($id);
        $id = $request->id; // diambil dari form
        $stok_saat_ini = $data->jumlah_stok_out;
        $stok_lama = $data->total;


        $jumlah_stok = DB::table('products')->where(['id' => $id])
        ->update(['stok_barang' => $stok_lama + $stok_saat_ini]);

        
        // dd($id);
        
        
        stok_outModel::destroy($id);

        // Session::flash('alert', 'Data Berhasil Di Hapus');

        return redirect()->route('stok_out')->with('success', 'Data Stok Keluar Berhasil Di Hapus...!');
    }
}
