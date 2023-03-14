<?php

namespace App\Http\Controllers;

use App\DataTables\TransaksiDataTable;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(TransaksiDataTable $dataTable)
    {
        return $dataTable->render("table_master.transaksi.index");
    }

    public function create(){
        return view("table_master.transaksi.create");
    }

    public function store(Request $request){
        $transaksi = new Transaksi();
        $transaksi->nama = $request->nama;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->status_pesanan = $request->status_pesanan;
        $transaksi->status_pembayaran = $request->status_pembayaran;
        $transaksi->jenis = $request->jenis;
        $transaksi->save();

        return redirect()->route("transaksi.index")->with("message", [
            "message" => "Berhasil membuat transaksi",
            "type" => "success"
        ]);
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->nama = $request->nama;
        $transaksi->email = $request->email;
        $transaksi->role = $request->role;
        $transaksi->alamat_outlet = $request->alamat_outlet;
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
