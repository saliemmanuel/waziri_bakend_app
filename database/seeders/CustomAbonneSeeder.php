<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomAbonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) DB::table('abonne_models')->insert([
            "nom_abonne" => fake()->name(),
            "prenom_abonne" => fake()->lastName(),
            "cni_abonne" => '741258525852',
            "telephone_abonne" => fake()->phoneNumber(),
            "description_zone_abonne" => 'Lorem magna minim magna nisi.',
            "id_chef_secteur"  => 1,
            "type_abonnement"  => fake()->phoneNumber(),
        ]);
    }
}
