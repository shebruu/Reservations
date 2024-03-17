<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Locality::truncate();

        //Define data
        $dataset = [
            ['postal_code' => '1090', 'locality' => 'Belgique'],


        ];

        //Insert data in the table
        DB::table('localities')->insert($dataset);
    }
}
