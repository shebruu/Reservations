<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Tag::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $tags = ['Drama', 'Comedy', 'Action', 'Romance'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
