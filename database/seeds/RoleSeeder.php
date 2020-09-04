<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 
     *   DB::table('roles')->insert([
     *       'name' => Str::random(10),
     *       'description' => Str::random(10)
     *   ]);
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            ['name' => 'customer', 'description' => 'Like a consumer, buyer, tenant, renter', 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['name' => 'seller'  , 'description' => 'Something like a seller, distributor, owner', 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
        ]);
    }
}
