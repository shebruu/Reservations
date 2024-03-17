<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataset = [
            [
                'name' => 'John ',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'sara',
                'email' => 'sara.doe@example.com',
                'password' => Hash::make('password'),
            ],

        ];
        foreach ($dataset as $data) {
            // Vérifie si l'utilisateur existe déjà par son email
            $user = User::where('email', $data['email'])->first();

            if (!$user) {
                // Si l'utilisateur n'existe pas, on le crée
                User::create($data);
            } else {
                //mise a jour
                // $user->update($data);
            }
        }
    }
}
