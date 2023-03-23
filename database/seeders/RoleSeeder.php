<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $something = explode("|", <<<STR
        Admin|Kasir|Owner 
        STR);
   

        for($i = 0; $i < count($something); $i ++) {
            DB::table('role')->insert([
                'nama' => $something[$i],
                "created_at" => Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
