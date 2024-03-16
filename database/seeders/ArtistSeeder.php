<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Artist;


class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //Empty the table first
        Artist::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $artists = [
            ['firstname' => 'Daniel', 'lastname' => 'Marcelin'],
            ['firstname' => 'Philippe', 'lastname' => 'Laurent'],
            ['firstname' => 'Marius', 'lastname' => 'Von Mayenburg'],
            ['firstname' => 'Olivier', 'lastname' => 'Boudon'],
            ['firstname' => 'Anne Marie', 'lastname' => 'Loop'],
            ['firstname' => 'Pietro', 'lastname' => 'Varasso'],
            ['firstname' => 'Laurent', 'lastname' => 'Caron'],
            ['firstname' => 'Élena', 'lastname' => 'Perez'],
            ['firstname' => 'Guillaume', 'lastname' => 'Alexandre'],
            ['firstname' => 'Claude', 'lastname' => 'Semal'],
            ['firstname' => 'Laurence', 'lastname' => 'Warin'],
        ];

        //Insert data in the table
        DB::table('artists')->insert($artists);
    }
}
