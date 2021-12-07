<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAccountSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_accounts')->insert([
            'number' => '0000123-4',
            'balance' => 200,
            'user_id' => 1,
        ]);
        DB::table('user_accounts')->insert([
            'number' => '0000124-4',
            'balance' => 500,
            'user_id' => 2,
        ]);
        DB::table('user_accounts')->insert([
            'number' => '0000125-4',
            'balance' => 100,
            'user_id' => 3,
        ]);
        DB::table('user_accounts')->insert([
            'number' => '0000126-4',
            'balance' => 500,
            'user_id' => 4,
        ]);
    }
}
