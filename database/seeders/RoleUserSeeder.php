<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        DB::table('user_role')->truncate();
        Schema::enableForeignKeyConstraints();


        $data =  [
            [
                'firstname' => 'John',
                'lastname' => 'Loga',
                'role' => 'admin',
            ],
            [
                'firstname' => 'sara',
                'lastname' => 'wysk',
                'role' => 'member',
            ]
        ];



        foreach ($data as $userData) {
            // Assurez-vous que l'utilisateur et le rôle existent
            $user = User::where(
                'firstname',
                $userData['firstname']
            )->where(
                'lastname',
                $userData['lastname']
            )->first();

            $role = Role::where(
                'role',
                $userData['role']
            )->first();

            if ($user && $role) {
                DB::table('user_role')->updateOrInsert([
                    'user_id' => $user->id,
                    'role_id' => $role->id,
                ]);
            }
        }
    }
}
