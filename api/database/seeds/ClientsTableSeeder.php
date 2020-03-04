<?php

use Illuminate\Database\Seeder;
use Str;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name'        => Str::random(10),
            'description' => Str::random(10),
            'logo'        => Str::random(10),
        ]);
    }
}
