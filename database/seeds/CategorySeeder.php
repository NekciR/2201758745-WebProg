<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Categories')->insert([
            ['name' => 'Travel'],
            ['name' => 'Food'],
            ['name' => 'Tech'],
            ['name' => 'Diary'],
            ['name' => 'Health']
        ]);
    }
}
