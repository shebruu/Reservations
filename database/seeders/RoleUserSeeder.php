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
            ],
            [
                'firstname' => 'Alice',
                'lastname' => 'Merton',
                'role' => 'member',
            ],
            [
                'firstname' => 'Ebru',
                'lastname' => 'Sahin',
                'role' => 'member',
            ],
            [
                'firstname' => 'Bob',
                'lastname' => 'Marley',
                'role' => 'affiliate',
            ],
            [
                'firstname' => 'Clara',
                'lastname' => 'Smith',
                'role' => 'admin',
            ]
        ];


        foreach ($data as $userData) {
            $userId = DB::table('users')
                ->where('firstname', $userData['firstname'])
                ->where('lastname', $userData['lastname'])
                ->value('id');

            $roleId = DB::table('roles')
                ->where('role', $userData['role'])
                ->value('id');

            if ($userId && $roleId) {
                DB::table('user_role')->updateOrInsert(
                    ['user_id' => $userId, 'role_id' => $roleId],
                    ['user_id' => $userId, 'role_id' => $roleId]
                );
            }
        }
    }
}
