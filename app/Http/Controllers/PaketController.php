<?php

namespace App\Http\Controllers;

use App\DataTables\PaketDataTable;
use App\Models\Paket;
use Illuminate\Http\Request;


class PaketController extends Controller
{
    public function index(PaketDataTable $dataTable)
    {
        return $dataTable->render("table_master.paket.index");
    }

    public function create(){
        return view("table_master.paket.create");
    }

    public function store(Request $request){
        $paket = new Paket();
        $paket->id_outlet = $request->id_outlet;
        $paket->jenis = $request->jenis;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->estimasi_waktu = $request->estimasi_waktu;
        $paket->save();

        return redirect()->route("paket.index")->with("message", [
            "message" => "Berhasil membuat paket",
            "type" => "success"
        ]);
    }

    public function update(Request $request, $id)
    {
        $paket = Paket::find($id);
        $paket->id_outlet = $request->id_outlet;
        $paket->jenis = $request->jenis;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->estimasi_waktu = $request->estimasi_waktu;
        $paket->update();

        return redirect()->route("paket.index")->with("message", [
            "message" => "Berhasil mengedit paket",
            "type" => "success"
        ]);
    }

    public function edit($id)
    {
        $paket = Paket::find($id);
        return view("table_master.paket.edit", [
           "paket" => $paket
        ]);
    }

    public function destroy($id)
    {
        $paket = Paket::findorFail($id);
        $paket->delete();

        return redirect()->back()->with("message", [
            "message" => "Berhasil menghapus paket",
            "type" => "success"
        ]);
    }
}
