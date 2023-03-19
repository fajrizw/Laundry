<?php

namespace App\Http\Controllers;

use App\DataTables\TransaksiDataTable;
use App\DataTables\DetailTransaksiDataTable;
use Illuminate\Support\Carbon;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{   
    
    public function index(TransaksiDataTable $transDataTable, DetailTransaksiDataTable $detDataTable)
    {
        return view('table_master.transaksi.index', [
            'transDataTable' => $transDataTable->html(),
            'detDataTable' => $detDataTable->html()
        ]);
    }

    public function create(){
        return view("table_master.transaksi.create");
    }

    public function store(Request $request){
        $transaksi = new Transaksi();
        $transaksi->kode_invoice = $request->kode_invoice;
        $transaksi->id_outlet = $request->id_outlet;
        $transaksi->id_member = $request->id_member;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->status_pemesanan = $request->status_pemesanan;
        $transaksi->status_pembayaran = $request->status_pembayaran;
        $transaksi->id_user = $request->id_user;
        $transaksi->id_voucher = $request->id_voucher;
        $transaksi->id_paket = $request->id_paket;

        $transaksi->save();

        return redirect()->route("transaksi.index")->with("message", [
            "message" => "Berhasil membuat transaksi",
            "type" => "success"
        ]);
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->kode_invoice = $request->kode_invoice;
        $transaksi->id_outlet = $request->id_outlet;
        $transaksi->id_member = $request->id_member;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->status_pemesanan = $request->status_pemesanan;
        $transaksi->status_pembayaran = $request->status_pembayaran;
        $transaksi->id_user = $request->id_user;
        $transaksi->id_voucher = $request->id_voucher;
        $transaksi->id_paket = $request->id_paket;
        $transaksi->update();

        return redirect()->route("transaksi.index")->with("message", [
            "message" => "Berhasil mengedit transaksi",
            "type" => "success"
        ]);
    }

    public function detail($id)
    {
        $transaksi = Transaksi::find($id);
        return view("table_master.transaksi.edit", [
           "transaksi" => $transaksi
        ]);
    }


    public function destroy($id)
    {
        $transaksi = Transaksi::findorFail($id);
        $transaksi->delete();

        return redirect()->back()->with("message", [
            "message" => "Berhasil menghapus transaksi",
            "type" => "success"
        ]);
    }
}
