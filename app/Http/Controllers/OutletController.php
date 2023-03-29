<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataTables\OutletDataTable;
use App\Models\Outlet;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OutletExport;

class OutletController extends Controller
{
    public function index(OutletDataTable $dataTable)
    {
        return $dataTable->render("table_master.outlet.index");
    }

    public function create()
    {
      return view('table_master.outlet.create');
    }

    public function store(Request $request)
    {
        $outlet = new Outlet();
        $outlet->nama_outlet = $request->nama_outlet;
        $outlet->alamat_outlet = $request->alamat_outlet;
        $outlet->tlp = $request->tlp;
        $outlet->biaya_admin = $request->biaya_admin;
        $outlet->save();

        return redirect()->route("outlet.index")->with("message", [
            "message" => "Berhasil membuat outlet",
            "type" => "success"
        ]);

    }



    public function update(Request $request, $id)
    {
        $outlet = Outlet::find($id);
        $outlet->nama_outlet = $request->nama_outlet;
        $outlet->alamat_outlet = $request->alamat_outlet;
        $outlet->tlp = $request->tlp;
        $outlet->biaya_admin = $request->biaya_admin;
        $outlet->update();


        return redirect()->route("outlet.index")->with("message", [
            "message" => "Berhasil mengedit outlet",
            "type" => "success"
        ]);

    }
    public function edit ($id)
    {
        $outlet = Outlet::find($id);
        return view('table_master.outlet.edit', [
            "outlet" => $outlet
        ]);
    }

    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);
        $outlet->delete();

        return redirect()->back()->with('message', [
            "message" => 'Berhasil menghapus outlet',
            "type" => "success"
        ]);
    }


    // private function jumlahOutletDi($month, $year) {
    //     $query = (array) DB::select("SELECT jumlahOutletDi($month, $year)")[0];
    //     return $query["jumlahOutletDi($month, $year)"];
    // }
}
