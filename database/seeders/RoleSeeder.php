<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Schema; // Assurez-vous d'importer Schema
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();

        // Votre logique de nettoyage pour roles ici
        DB::table('roles')->truncate();

        Schema::enableForeignKeyConstraints();
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
