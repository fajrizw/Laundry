<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $jenis = explode("|", "bed_cover|kaos|kiloan|selimut|lainnya");
        $something =[ 
            'Dry Cleaning','Self Service','Laundry Kiloan','On Demand','Cleanlite Laundry', 'Service Netto','Dressed Laundry'];
        $harga = [4000,5000,4000,5000,6000,3000,4000];
        $outlet = [1,2,3,4,5,1,2];
        $estimasi = [32,24,26,27,20,34,26];

        for($i = 0; $i < count($something); $i ++) {
            DB::table('paket')->insert([
                'id_outlet' => $outlet[$i],   
                'jenis' => $jenis[array_rand($jenis)],
                'nama_paket' => $something[$i],
                'harga' => $harga[$i],
                'estimasi_waktu' => $estimasi[$i],
                "created_at" => Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
