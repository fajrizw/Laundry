<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        $something = explode("|", <<<STR
        Admin Laundry|Illua Style|Gon Cling|Hisoka Cool|Freecs Fever|Kurapika Laundry|Leorio Laundry|Oden Ciamis|Ant Cooke
        STR);
        $role = [1,2,3,2,3,2,3,2,3,2];
        $outlet = [1,2,3,4,5,1,2,3,4,5];

        for($i = 0; $i < count($something); $i ++) {
            $email = strtolower(str_replace(' ', '_', $something[$i])) . '@gmail.com';
        DB::table('users')->insert([
            'name' =>  $something[$i],
            'email' =>  $email,
            'password' => Hash::make('password'),
            'id_outlet' => $outlet[$i],
            'id_role' =>  $role[$i],

          
        ]);

        }
    }
}
