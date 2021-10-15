<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use App\Product;
use App\supplinerModel;
use App\stok_outModel;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;
Use Alert;
use Session;
use Excel;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     
    public function index(Request $request)
    {

        // menangkap data pencarian
        $cari = $request->cari;
        $data = Product::where('barcode','like',"%".$cari."%")->orwhere('nama_barang','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(5);
        
        $data_kategori = DB::select('select nama_kategori from kategoris');
        $data_suppliner = DB::select('select nama_suppliner from suppliners');
        $data_satuan = DB::select('select satuan from satuans');
        $data_stok = DB::select('select total from stok_outs');
        $produk_habis = DB::select('select nama_barang from products where stok_barang <= 10');
        return view('admin.produk.produk', [
            'data_kategori' => $data_kategori,
            'data_suppliner' => $data_suppliner,
            'data_stok' => $data_stok,
            'data_satuan' => $data_satuan])->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $data = new Product();
        $data->id = $id;
        $data->nama_barang = $request->nama_barang;
        $data->barcode = $request->barcode;
        $data->suppliner = $request->suppliner;
        $data->stok_barang = $request->stok_barang;
        $data->satuan_barang = $request->satuan;
        $data->kategori = $request->kategori;
        $data->harga_modal = $request->harga_modal;
        $data->harga_jual = $request->harga_jual;
        // cek gambar dari form
        if($request->hasFile('foto')){
            // memindahkan foto ke dalam folder public/images
            $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
            // menyimpan nama foto ke dalam database
            $data->foto = $request->file('foto')->getClientOriginalName();   
        }
        $data->save();

        return redirect()->route('product')->with('success','Data Produk Berhasil Di Tambahkan...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit($id)
    {
        $data = Product::find($id);
        $data_kategori = DB::select('select nama_kategori from kategoris');
        $data_suppliner = DB::select('select nama_suppliner from suppliners');
        $data_satuan = DB::select('select satuan from satuans');

        return view('admin.produk.produk_edit', [
            'data' => $data,
            'data_kategori' => $data_kategori,
            'data_suppliner' => $data_suppliner,
            'data_satuan' => $data_satuan]);
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
        // mengambi data sesuai id
        $data = Product::find($id);
        $data->nama_barang = $request->nama_barang;
        $data->barcode = $request->barcode;
        // cek jika gambar  ada
        if($request->hasFile('foto')){
            $gambar = Product::where('id',$id)->first();
            // hapus foto yg lama
            File::delete('images/'. $gambar->foto);
            // upload foto yg baru
            $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
        }
            
        $data->suppliner = $request->suppliner;
        $data->satuan_barang = $request->satuan_barang;
        $data->stok_barang = $request->stok_barang;
        $data->kategori = $request->kategori;
        $data->harga_modal = $request->harga_modal;
        $data->harga_jual = $request->harga_jual;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Ubah');

        return redirect()->route('product')->with('success', 'Data Produk Berhasil Di Ubah...!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        //hapus file foto di folder public image
        $gambar = Product::where('id',$id)->first();
        File::delete('images/'. $gambar->foto);

        Product::destroy($id);
    
            return redirect()->route('product')->with('success','Data Produk Berhasil Di Hapus...!');
    }
    public function destroyfoto(Request $request ,$foto)
    {


        //hapus file foto di folder public image
        $gambar = Product::where('foto',$foto)->first();
        File::delete('images/'. $gambar->foto);

        DB::table('products')->where('foto', $foto)->delete();
    
            return redirect()->route('product')->with('success','Data Produk Berhasil Di Hapus...!');
    }

    public function excel(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

         $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

        if ($data->count() > 0) 
        {
            foreach ($data->toArray() as $key => $value) 
            {
                foreach ($value as $getproduk )
                {
                    $insert_data[] = array(
                        'nama_barang' => $getproduk['nama_barang'],
                        'barcode' => $getproduk['barcode'],
                        'suppliner' => $getproduk['suppliner'],
                        'stok_barang' => $getproduk['stok_barang'],
                        'kategori' => $getproduk['kategori'],
                        'foto' => $getproduk['foto'],
                        'harga_modal' => $getproduk['harga_modal'],
                        'harga_jual' => $getproduk['harga_jual']
                    );
                }
            }
            if (!empty($insert_data)) {
                DB::table('products')->insert($insert_data);
            }
        }
        return view('admin.produk.produk')->with('success', 'Excel Behasil Di Import');
    }
}
