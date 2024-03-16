<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //Empty the table first
        Type::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        //Define data
        $dataset = [
            ['type' => 'scenographe'],
            ['type' => 'auteur'],
            ['type' => 'comédien'],

        ];

        //Insert data in the table
        DB::table('types')->insert($dataset);
    }
}
