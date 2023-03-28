<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{   
    
    

    public function index (Request $request)
    {
        $transaksi = DB::select('SELECT COUNT(*) as jumlah_transaksi FROM transaksi,member WHERE transaksi.id_member = member.id');
        $jumlah_transaksi = $transaksi[0]->jumlah_transaksi;

        $outlet = DB::select('SELECT COUNT(*)as jumlah_outlet FROM outlet');
        $jumlah_outlet = $outlet[0]->jumlah_outlet;


        $kasir = DB::select('SELECT COUNT(*)as jumlah_kasir FROM users WHERE id_role NOT IN (1, 3)');
        $jumlah_kasir = $kasir[0]->jumlah_kasir;

        $owner = DB::select('SELECT COUNT(*)as jumlah_owner FROM users WHERE id_role NOT IN (1, 2)');
        $jumlah_owner = $owner[0]->jumlah_owner;

        $date = Carbon::now();

            $data = [];

       

        return view('dashboard/dashboard', compact('jumlah_transaksi','jumlah_outlet','jumlah_kasir','jumlah_owner','date'));
    }

    
}
