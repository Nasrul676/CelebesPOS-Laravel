<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use App\RiwayatTransaksiModel;
use App\Product;
// use Charts;
Use Alert;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tanggal = $request->tanggal;
        // dd($tanggal);

        $totalpenghasilan = DB::table('history_transactions')->sum('harga');
        $total_penghasilan = $totalpenghasilan;
        $data_customer = DB::table('customers')->count();
        $data_penjualan = DB::table('history_transactions')->count();
        $data_stok = DB::select('select nama_barang ,barcode, stok_barang, satuan_barang from products where stok_barang <= 10');

        if ($tanggal = $tanggal) {
            $laris = DB::select('SELECT nama_barang, SUM(qty) qty FROM history_transactions WHERE tanggal = "'.$tanggal.'" GROUP BY nama_barang ORDER BY qty LIMIT 10');
        } else {
            $laris = DB::select('SELECT nama_barang, SUM(qty) qty FROM history_transactions  GROUP BY nama_barang ORDER BY qty LIMIT 10');    
        };
        
        $chartlarisnama = [];
        $chartlarisstok = [];

        foreach ($laris as $lar) {
            $chartlarisnama[] = $lar->nama_barang;
            $chartlarisstok[] = $lar->qty;
        }

// dd($chartlarisnama);
        return view('dashboard', [
            'data_customer' => $data_customer,
            'data_stok' => $data_stok,
            'laris' => $laris,
            'chartlarisnama' => $chartlarisnama,
            'chartlarisstok' => $chartlarisstok,
            'data_penjualan' => $data_penjualan
            ])->with('total_penghasilan', $totalpenghasilan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kasir()
    {
        return view('kasir.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
