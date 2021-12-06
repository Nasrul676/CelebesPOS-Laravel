<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\stok_inModel;
use App\supplinerModel;
use Session;
use Faker\Provider\Uuid;
use App\Product;
use DataTables;
use Illuminate\Support\Facades\DB;

class Stok_InController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $data = stok_inModel::where('nama_barang','like',"%".$cari."%")->orwhere('barcode','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(5);
        return view('admin.stok.stok_masuk')->with('data',$data);
        // dump($data);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function create(Request $request)
    {
        $data_suppliner = DB::select('select nama_suppliner from suppliners');
        $data_kategori = DB::select('select nama_kategori from kategoris');
        $data_product = DB::select('select * from products');
        // dump($data_product);
        return view('admin.stok.stok_masuk_tambah', [
            'data_suppliner' => $data_suppliner,
            'data_kategori' => $data_kategori,
            'data_product' => $data_product]);
    }

    public function cari(Request $request){
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qty = $request->stok_barang;
        $id = $request->id;
        $jumlah = $request->jumlah_produk;
        $jumlah_produky = DB::table('products')->where(['id' => $id])
            ->update(['stok_barang' => $qty + $jumlah])
        ;
        $total = $qty + $jumlah;
        $data = new stok_inModel();
        $data->total = $total;
        $data->barcode = $request->barcode;
        $data->nama_barang = $request->nama_produk;
        $data->satuan_barang = $request->satuan_barang;
        $data->kategori = $request->kategori;
        $data->harga_modal = $request->harga_modal;
        $data->harga_jual = $request->harga_jual;
        $data->suppliner = $request->suppliner;
        $data->jumlah_produk = $request->jumlah_produk;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Tambahkan');

         return redirect()->route('stok_in')->with('success', 'Data Stok Masuk Berhasil Di Tambahkan...!');
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
        $data = stok_inModel::find($id);
        $qty = $data->jumlah_produk;
        $id = $request->id;
        $barcode = $data['barcode'];
        $jumlah = $data->total;
        $jumlah_produky = DB::table('products')->where(['barcode' => $barcode])
            ->update(['stok_barang' =>   $jumlah - $qty]);   
        
        stok_inModel::destroy($id);

        // Session::flash('alert', 'Data Berhasil Di Hapus');

        return redirect()->route('stok_in')->with('success', 'Data Stok Masuk Berhasil Di Hapus...!');
    }

    public function otomatis(Request $request){
        try {
           $barcode = $request->barcode;
           $getData = DB::select("SELECT * FROM products WHERE barcode ='$barcode'");
           return response()->json($getData, 200);
       } catch (\Throwable $th) {
           return response()->json([
               'message' => $th->getMessage()
           ], 500);
       }
    //    $data = DB::table('products')->where(['barcode' => $barcode])->first();
    }

}
