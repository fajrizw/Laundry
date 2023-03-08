<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 50; $i ++) {
            DB::table('member')->insert([
                'nama' => Str::random(10),
                'alamat' => Str::random(10),
                'jenis_kelamin' => "L",
                'tlp' => strval(mt_rand(6282000000000 , 6282999999999))
            ]);
        }
    }
}
