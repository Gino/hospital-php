<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'client_id' => 1,
            'client_firstname' => 'Jane',
            'client_lastname' => 'Doe'
        ]);

        DB::table('clients')->insert([
            'client_id' => 2,
            'client_firstname' => 'John',
            'client_lastname' => 'Doe'
        ]);
    }
}
