<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use App\Product;
use App\RiwayatTransaksiModel;
Use Alert;
use PDF;

class LaporanController extends Controller
{
    public function index(){
        $cek = Product::select('nama_barang')->where('stok_barang', '<=', 10)->first();
        $cek1 = json_encode($cek);
        // dd($cek1);
        $data_stok = DB::select('select nama_barang, stok_barang, satuan_barang from products where stok_barang <= 10');

        return view('laporan.laporan_stok', [
            'data_stok' => $data_stok,
            'cek' => $cek1
            ]);
    }

    public function laris(){

    	$laris = DB::select('SELECT nama_barang, SUM(qty) qty,  SUM(harga) harga FROM history_transactions GROUP BY nama_barang ORDER BY qty DESC');
        // dd($laris);
    	return view('laporan.laporan_stok_paling_laris')->with('laris', $laris);
    }

    public function laporanTerlarispdf(Request $request){

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        $laris = DB::select('SELECT nama_barang, SUM(qty) qty,  SUM(harga) harga FROM history_transactions WHERE tanggal BETWEEN "'.$tanggalAwal.'" AND "'.$tanggalAkhir.'"  GROUP BY nama_barang ORDER BY qty DESC');

        // $laris = DB::table('history_transactions')->where('tanggal', [$tanggalAwal, $tanggalAkhir])->sum('qty');

        $pdf = PDF::loadview('laporan.Laporan_Barang_Terlaris_pdf',[
            'laris' => $laris,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir 
        ]);

        return $pdf->stream('invoice-kasir-pdf');
    }

    public function riwayatTransaksiPdf(Request $request){

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        $lapor = DB::table('history_transactions')->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

        // dd($lapor);

        $pdf = PDF::loadview('laporan.laporan_riwayat_transaksi_pdf',[
            'lapor' => $lapor,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir 
        ]);

        return $pdf->stream('invoice-kasir-pdf');

    }

    public function laporanStokHabispdf(Request $request){

        $lapor = DB::select('select nama_barang, stok_barang, satuan_barang from products where stok_barang <= 10');

        // dd($lapor);

        $pdf = PDF::loadview('laporan.laporan_Stok_Habis_pdf',[
            'lapor' => $lapor,
        ]);

        return $pdf->stream('invoice-kasir-pdf');
    }
}
