<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\DataTables\DetailTransaksiDataTable;

class DetailTransaksiController extends Controller
{
    public function index(DetailTransaksiDataTable $dataTables)
    {
        return $dataTables->render("table_master.transaksi.index");
    }

    public function create(){
        return view("table_master.detail_transaksi.create");
    }

    public function store(Request $request){
        $detail_transaksi = new DetailTransaksi();
        $detail_transaksi ->id_transaksi = $request->id_transaksi;
        $detail_transaksi ->id_paket = $request->id_paket;
        $detail_transaksi ->qty = $request->qty;
        $detail_transaksi ->keterangan = $request->keterangan;
        $detail_transaksi->save();

        return redirect()->route("transaksi.index")->with("message", [
            "message" => "Berhasil membuat transaksi",
            "type" => "success"
        ]);
    }


    public function destroy($id)
    {
        $detail_transaksi = DetailTransaksi::findorFail($id);
        $detail_transaksi->delete();

        return redirect()->back()->with("message", [
            "message" => "Berhasil menghapus detail transaksi",
            "type" => "success"
        ]);
    }
} 
