<?php

namespace Database\Seeders;

use App\Models\Keyword;
use App\Models\Location;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
        $this->call([
            UserSeeder::class,
            ArtistSeeder::class,
            TypeSeeder::class,
            ArtistTypeSeeder::class,
            LocalitySeeder::class,
            RoleSeeder::class,
            LocationSeeder::class,
            ShowSeeder::class,
            RepresentationSeeder::class,
            ArtistTypeShowSeeder::class,
            RoleUserSeeder::class,
            RepresentationUserSeeder::class,
            TagSeeder::class,
            ShowTagSeeder::class,

        ]);
    }
}
