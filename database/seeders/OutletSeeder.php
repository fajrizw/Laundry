<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $jenis_kelamin = explode("|", "L|P");
        $something = explode("|", <<<STR
        Fresh Sangat|Her Style|Clean Cling|Sheeshh Cool|Baby Fever|Yoyoy Laundry|Epan Laundry|Gudang Nikmat|Silent Cooke
        STR);
        $duit = [2000,3000,1000,2000,3000,1000,2000,3000,4000];

        for($i = 0; $i < count($something); $i ++) {
            DB::table('outlet')->insert([
                'nama_outlet' => $something[$i],
                'alamat_outlet' => "Jalan ".explode(" ", $something[$i])[1],
                'tlp' => strval(mt_rand(6282000000000 , 6282999999999)),
                'biaya_admin' => $duit[$i],
                "created_at" => Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
