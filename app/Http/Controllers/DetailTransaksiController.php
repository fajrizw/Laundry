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
use Illuminate\Support\Facades\Hash;

use Barryvdh\DomPDF\Facade\Pdf;

class DetailTransaksiController extends Controller
{
    public function index(DetailTransaksiDataTable $dataTables, $id)
    {
         // Retrieve the DetailTransaksi record using its own primary key
    $detailTransaksi = DetailTransaksi::find($id);
    
    // Retrieve the Transaksi record using its own primary key
    $transaksi = Transaksi::find($detailTransaksi->id_transaksi);
    
    // Retrieve the Paket record using the paket_id foreign key stored in the DetailTransaksi record
    $paket = Paket::find($detailTransaksi->id_paket);
    
    // Retrieve the Member record using the member_id foreign key stored in the Transaksi record
    $member = Member::find($transaksi->id_member);
    
    // Retrieve the Voucher record using the voucher_id foreign key stored in the Transaksi record
    $voucher = Voucher::find($transaksi->id_voucher);
    
    // Retrieve the User record using the user_id foreign key stored in the Transaksi record
    $users = User::find($transaksi->id_user);
    
    // Retrieve the Outlet record using the outlet_id foreign key stored in the Transaksi record
    $outlet = Outlet::find($transaksi->id_outlet);

        // Call the stored procedure and pass the user ID as a parameter
        $result = DB::select('CALL transaksi_penggunaBaru(?)', [$transaksi->id]);

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
        $detail_transaksi->id_transaksi = $request->id_transaksi;
        $detail_transaksi->id_paket = $request->id_paket;
        $detail_transaksi->qty = $request->qty;
        $detail_transaksi->keterangan = $request->keterangan;
        $detail_transaksi->save();

        return redirect()->route("detail_transaksi.index")->with("message", [
            "message" => "Berhasil membuat detail transaksi",
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


    public function exportPdf()
    {     
        $detailTransaksi = DetailTransaksi::all();
      
        $pdf = PDF::loadView('table_master.detail_transaksi.nota_laundry', compact('detailTransaksi'));
        return $pdf->stream('nota_laundry.pdf');

    }
}
