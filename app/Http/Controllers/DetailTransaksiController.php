<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\DataTables\DetailTransaksiDataTable;
use Illuminate\Support\Facades\DB;

class DetailTransaksiController extends Controller
{
    public function index(DetailTransaksiDataTable $dataTables, $id)
    {

        $detailTransaksi = DetailTransaksi::find($id);
        $transaksi = Transaksi::find($id);
        $paket = Paket::find($id);
        $member = Member::find($id);
        $voucher = Voucher::find($id);
        $users = User::find($id);
        $outlet = Outlet::find($id);
        // Call the stored procedure and pass the user ID as a parameter
        $result = DB::select('CALL transaksi_penggunaBaru(?, ?)', [$member->id, $transaksi->id]);

        // Process the result set returned by the stored procedure
        // (in this case, it should contain a single row with a single column)
        $transaksi_pertama = $result[0]->transaksi_pertama;

  // Do something with the result
        return $dataTables->render("table_master.detail_transaksi.index", compact('detailTransaksi', 'transaksi', 'paket', 'member', 'voucher', 'users', 'outlet', 'transaksi_pertama'));
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
