<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\DB;
use App\satuan;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $data = satuan::where('satuan','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(5);
        return view('admin.produk.satuan')->with('data',$data);
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
        $data = new satuan();
        $data->id = $id;
        $data->satuan = $request->satuan;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Tambahkan');

        return redirect()->route('satuan')->with('success', 'Data Satuan Berhasil Di Tambahkan...!');
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
        $data = satuan::find($id);
        return view('admin.produk.satuan_edit', compact('data'));
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

        $satuan = $request->satuan;
        $jumlah_produky = DB::table('products')->where(['satuan_barang' => $satuan])
            ->update(['satuan_barang' => $satuan]);

        $data = satuan::find($id);
        $data->satuan = $request->satuan;
        $data->save();

        // Session::flash('alert', 'Data Berhasil Di Ubah');

        return redirect()->route('satuan')->with('success', 'Data Satuan Berhasil Di Ubah...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        //


        satuan::where('id', $id)->delete();

        // Session::flash('alert', 'Data Berhasil Di Hapus');

            return redirect()->route('satuan')->with('success', 'Data Satuan Berhasil Di Hapus...!');
    }
}
