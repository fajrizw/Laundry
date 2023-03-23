<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        $something =[ 
        'Pengguna Baru','Hari Raya Idul Fitri','Hari Raya Idul Adha','Ulang tahun Web Laundry', 'Pengguna Baru','Pengguna Baru', 'Pengguna Baru','Pengguna Baru','Pengguna Baru','Pengguna Baru','Pengguna Baru','Pengguna Baru'];
        $diskon = [10,20,20,30,10,10,10,10,10,10];
        $outlet = [1,1,1,1,2,3,4,5,6,7,8,9,];

        for($i = 0; $i < count($something); $i ++) {
            DB::table('voucher')->insert([
                'nama' => $something[$i],
                'diskon' => $diskon[$i],
                'id_outlet' => $outlet[$i],
                "created_at" => Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
