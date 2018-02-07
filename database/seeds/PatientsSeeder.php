<?php

use Illuminate\Database\Seeder;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'patient_id' => 1,
            'patient_name' => 'Bobbie',
            'species_id' => 1,
            'client_id' => 1,
            'patient_status' => 'Koorts, eet slecht, blaft veel te veel'
        ]);

        DB::table('patients')->insert([
            'patient_id' => 2,
            'patient_name' => 'Minoes',
            'species_id' => 2,
            'client_id' => 2,
            'patient_status' => 'Drinkt niet, haaruitval, mager'
        ]);

        DB::table('patients')->insert([
            'patient_id' => 3,
            'patient_name' => 'Kees',
            'species_id' => 1,
            'client_id' => 2,
            'patient_status' => 'Eet te veel, vetzucht, jankt en kotst'
        ]);

    }
}
