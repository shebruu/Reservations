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
                'firstname' => 'john ',
                'lastname' => 'loga ',
                'email' => 'john.doe@example.com',
                'login' => 'johny4',
                'langue' => 'fr',
                'password' => Hash::make('password'),
            ],
            [
                'firstname' => 'sara',
                'lastname' => 'wysk',
                'login' => 'wysky3',
                'langue' => 'fr',
                'email' => 'sara.doe@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'firstname' => 'ebru',
                'lastname' => 'sahin',
                'login' => 'ebsahin',
                'langue' => 'fr',
                'email' => 'ebsahinn7887@outlook.com',
                'password' => Hash::make('password'),
            ],
            [
                'firstname' => 'Alice',
                'lastname' => 'Merton',
                'email' => 'alice.merton@example.com',
                'login' => 'alice2024',
                'langue' => 'en',
                'password' => Hash::make('alicepassword'),
            ],
            [
                'firstname' => 'Bob',
                'lastname' => 'Marley',
                'email' => 'bob.marley@example.com',
                'login' => 'bob2024',
                'langue' => 'en',
                'password' => Hash::make('bobpassword'),
            ],
            [
                'firstname' => 'Clara',
                'lastname' => 'Smith',
                'email' => 'clara.smith@example.com',
                'login' => 'clara2024',
                'langue' => 'fr',
                'password' => Hash::make('clarapassword'),
            ],

        ];
        foreach ($dataset as $data) {
            // Vérifie si l'utilisateur existe déjà par son email
            $user = User::where('email', $data['email'])->first();

            if (!$user) {
                // Si l'utilisateur n'existe pas, on le crée
                User::create($data);
            }
        }
    }
}
