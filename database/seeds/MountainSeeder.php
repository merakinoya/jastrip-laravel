<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use App\Mountain;

class MountainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mountains')->insert([
            ['mountain_name' => 'Gunung Rinjnai', 'mdpl' => '3726', 'address' => 'Lombok, NTB', 'latitude' => '-8.41057323921222', 'longitude' => '116.457048355251', 'url_google' => 'https://goo.gl/maps/XsMwL1xnAFp7Xg2T9', 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
        ]);
    }
}
