<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 106; $i++) {
            DB::table("users")->insert([
                'nom_utilisateur' => fake()->name(),
                'email' => Str::random(10) . '@gmail.com',
                'password' => fake()->password(),
                "prenom_utilisateur" => fake()->lastName(),
                'telephone_utilisateur' => 454545,
                'role_utilisateur' => 'admin',
                'zone_utilisateur' => 'admin',
                'id_utilisateur_initiateur' => 0
            ]);
        }
    }
}
