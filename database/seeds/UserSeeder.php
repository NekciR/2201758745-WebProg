<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            ['name' => 'admin', 'email' => 'admin@mail.com','phone' => '081222222222', 'role' => 'Admin', 'password' => bcrypt('admin')]
        ]);
    }
}
