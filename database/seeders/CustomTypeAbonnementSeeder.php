<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomTypeAbonnementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_abonnement_models')->insert([
            "designation_type_abonnement" => 'abonnement VIP',
            "montant" => '2500',
            "nombre_chaine" => "100",
            "id_initiateur" =>  1
        ]);

        DB::table('type_abonnement_models')->insert([
            "designation_type_abonnement" => 'Abonnement Classique',
            "montant" => '200',
            "nombre_chaine" => "55",
            "id_initiateur" =>  1
        ]);

        DB::table('type_abonnement_models')->insert([
            "designation_type_abonnement" => 'Abonnement étudiant',
            "montant" => '1500',
            "nombre_chaine" => "25",
            "id_initiateur" =>  1
        ]);
    }
}
