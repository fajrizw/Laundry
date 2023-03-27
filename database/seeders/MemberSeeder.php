<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // function randThrow($dice) {
    //     return $dice[array_rand($dice)];

    // }
    public function run(): void
    {
        $jenis_kelamin = explode("|", "L|P");
        $something = explode("|", <<<STR
        Udin Ellison|Sigit Diaz|Yuna Sloan|Paylater Nielsen|Siti Arias|Herdun Tate|Epan Callahan|Radu Alvarez|Cuti Cooke|Kane Grant|Corong Klein|Kiete Mayo|Mina Waters|Tonas Nash|Alaier Russo|Fajri Walter|Dillon Haney|Josephine Watkins|Levi Suarez|Angelo Gomez|Adyson Rodgers|Bobby Erickson|Seth Williams|Jazmyn Cohen|Raphael Benson|Corbin Jarvis|Aliyah Woodward|Jaeden Lester|Kennedi Salazar|Brielle Pace|Conrad Carey|Aiden Mcmahon|Malik Wolf|Izayah Steele|Jax Gillespie|Taniya Horton|Kamari Frost|Skylar Delacruz|Moises Key|Heaven Vargas
        STR);
        $outlet = [1,2,3,4,5,1,2,3,4,5];

        for($i = 0; $i < count($something); $i ++) {
            DB::table('member')->insert([
                'nama' => $something[$i],
                'alamat' => "Jalan ".explode(" ", $something[$i])[1],
                'jenis_kelamin' => $jenis_kelamin[array_rand($jenis_kelamin)],
                'tlp' => strval(mt_rand(6282000000000 , 6282999999999)),
                "created_at" => Carbon::now()->toDateTimeString(),
            ]);
        }

    }
}
