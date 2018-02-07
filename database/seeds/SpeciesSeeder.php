<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('species')->insert([
            'species_id' => 1,
            'species_description' => 'Hond'
        ]);

        DB::table('species')->insert([
            'species_id' => 2,
            'species_description' => 'Kat'
        ]);
    }
}
