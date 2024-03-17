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
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'sara',
                'email' => 'sara.doe@example.com',
                'password' => Hash::make('password'),
            ],
            // Vous pouvez ajouter autant d'utilisateurs que vous voulez ici
        ];

        // Bulk insert users
        foreach ($dataset as $data) {
            User::create($data);
        }
    }
}
