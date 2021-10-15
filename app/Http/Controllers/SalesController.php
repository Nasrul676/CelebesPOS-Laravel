<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use App\Product;
use App\SaleModel;
use App\customerModel;
use App\RiwayatTransaksiModel;
use Faker\Provider\Uuid;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use PDF;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $nama_customer = customerModel::all();
        $data = Product::where('barcode','like',"%".$cari."%")->orwhere('nama_barang','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(4);
        $transaction = DB::table('temp_transactions')->get();
        $totalharga = DB::table('temp_transactions')->sum('harga');
        $total = $totalharga;
        // dd($nama_customer);
        return view('kasir.kasir', [
            'transaction' => $transaction,
            'total' => $total,
            'namacustomer' => $nama_customer,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bayar(Request $request)
    {
        $total = $request->total_harga;
        $bayar = $request->bayar;
        if ($bayar < $total) {
            return redirect()->route('sales')->with('warning','Maaf, Uang Anda Kurang...!');
        } else {
        $kembalian = $bayar-$total;
        $pesan = 'kembalian anda Rp. '.$kembalian;

        \DB::table('temp_transactions')->delete();

        return redirect()->route('sales')->with('success',$pesan);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $nama_barang = $request->nama_barang;
        $qty = $request->stok_barang;
        $id = $request->id;
        $qtynow = $request->qty;
        $harga_jual = $request->harga_jual;
        $diskon = $request->diskon;
        $qtylama = $qty - $qtynow;
        $diskonnow = $harga_jual*$diskon/100;
        $total = $harga_jual*$qtynow-$diskonnow;
        $jumlah_stok = DB::table('products')->where(['id' => $id])
            ->update(['stok_barang' => $qty - $qtynow]);
        $cek = count(\DB::table('temp_transactions')->where('nama_barang',$nama_barang)->get());
        $cek2 = DB::table('temp_transactions')->where('nama_barang',$nama_barang)->value('diskon');
        $lama_diskon = DB::table('temp_transactions')->where('nama_barang',$nama_barang)->value('diskon');
        if ($cek > 0) {

            $diskon = $request->diskon;
            $qtynow = $request->qty;
            $harga_jual = $request->harga_jual;
            $diskonnow = $harga_jual*$diskon/100;
            $stok_lama = DB::table('temp_transactions')->where('nama_barang',$nama_barang)->value('qty');
            $harga_lama = DB::table('temp_transactions')->where('nama_barang',$nama_barang)->value('harga');
            $stok_baru = DB::table('temp_transactions')->where('nama_barang',$nama_barang)->value('qty_lama');
            $total = $harga_jual*$qtynow-$diskonnow;
            $total2 = $total + $harga_lama;
            $hasil = DB::table('temp_transactions')->where('nama_barang',$nama_barang)->update(['qty'=>$stok_lama+$qtynow]);
            $hasil2 = DB::table('history_transactions')->where('nama_barang',$nama_barang)->update(['qty'=>$stok_lama+$qtynow]);
            $hasil3 = DB::table('temp_transactions')->where('nama_barang',$nama_barang)->update(['qty_lama'=>$stok_baru-$stok_lama]);
            $hasil4 = DB::table('temp_transactions')->where('nama_barang',$nama_barang)->update(['harga'=>$total2]);
            $hasil5 = DB::table('history_transactions')->where('id',$id)->update(['harga'=>$total2]);
            if ($cek2 == 0) {
            $hasil6 = DB::table('temp_transactions')->where('nama_barang',$nama_barang)->update(['diskon'=>$diskon]);
            $hasil7 = DB::table('history_transactions')->where('id',$id)->update(['diskon'=>$diskon]);                  
            } else {

            }
            
        } else {

        $id = Uuid::uuid(4);
        $data = new saleModel();
        $data->id = $id;
        $data->nama_barang = $request->nama_barang;
        $data->qty = $qtynow;
        $data->qty_lama = $qtylama;
        $data->harga = $total;
        $data->tanggal = $request->tanggal;
        $data->nama_customer = $request->nama_customer;
        $data->diskon = $request->diskon;
        $data->save();

        $data = new RiwayatTransaksiModel();
        $data->id = $id;
        $data->nama_barang = $request->nama_barang;
        $data->qty = $qtynow;
        $data->harga = $total;
        $data->diskon = $request->diskon;
        $data->nama_customer = $request->nama_customer;
        $data->tanggal = $request->tanggal;
        $data->nama_kasir = $request->nama_kasir;
        $data->save();
        }
        
        $data = DB::table('customers');

        // dd($data);

        return redirect()->route('sales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function history(Request $request)
    {
        $cari = $request->cari;
        $data = RiwayatTransaksiModel::where('nama_barang','like',"%".$cari."%")->orderByRaw('created_at DESC')->paginate(8);

        return view('kasir.historytransaksi')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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

    public function invoice(){
        
        $data = saleModel::all();

        $totalharga = DB::table('temp_transactions')->sum('harga');
        $total = $totalharga;

        $totaldiskon = DB::table('temp_transactions')->sum('diskon');
        $totaldiskonbarang = $totaldiskon;

        $totalqty = DB::table('temp_transactions')->sum('qty');
        $totalqtybarang = $totalqty;

        $pdf = PDF::loadview('kasir.invoice',[
            'data' => $data, 
            'total' => $total,
            'diskon' => $totaldiskonbarang,
            'qty' => $totalqtybarang,
        ]);
        return $pdf->download('invoice-kasir-pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->id;
        // dd($id);
        $data = SaleModel::find($id);
        $nama_barang = $data->nama_barang;
        $qtynow = $data->qty;
        $qtylama = $data->qty_lama;
        
        $coba = DB::table('products')->where(['nama_barang' => $nama_barang])->update(['stok_barang' => $qtynow + $qtylama]);

        \DB::table('history_transactions')->where(['id' => $id])->delete();
        SaleModel::destroy($id);

        return redirect()->route('sales')->with('success', 'Pesanan Berhasil Di Hapus');
    }
}
