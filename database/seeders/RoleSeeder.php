<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();

        //Define data
        $dataset = [
            ['role' => 'admin'],
            ['role' => 'member'],
            ['role' => 'affiliate'],


        ];

        //Insert data in the table
        DB::table('roles')->insert($dataset);
    }
}
