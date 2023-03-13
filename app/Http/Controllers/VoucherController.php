<?php

namespace App\Http\Controllers;

use App\DataTables\VoucherDataTable;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index(VoucherDataTable $dataTable)
    {
        return $dataTable->render("table_master.voucher.index");
    }

    public function create()
    {
        return view("table_master.voucher.create");
    }

    public function store(Request $request)
    {
        $voucher = new Voucher();
        $voucher->nama = $request->nama;
        $voucher->diskon = $request->diskon;
        $voucher->id_outlet = $request->id_outlet;
        $voucher->save();

        return redirect()->route("voucher.index")->with("message", [
            "message" => "Berhasil membuat voucher",
            "type" => "success"
        ]);

    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::find($id);
        $voucher->nama = $request->nama;
        $voucher->diskon = $request->diskon;
        $voucher->id_outlet = $request->id_outlet;
        $voucher->update();

        return redirect()->route("voucher.index")->with("message", [
            "message" => "Berhasil mengedit voucher",
            "type" => "success"
        ]);
    }

    public function edit($id)
    {
        $voucher = Voucher::find($id);
        return view('table_master.voucher.edit', [
            "voucher" => $voucher
        ]);
    }

    public function destroy($id)
    {
        $voucher = Voucher::findorFail($id);
        $voucher->delete();

        return redirect()->back()->with("message", [
            "message" => "Berhasil menghapus voucher",
            "type" => "success"
        ]);
    }
}
