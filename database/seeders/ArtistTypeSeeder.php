<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\ArtistType;
use App\Models\Type;
use App\Models\Artist;


class ArtistTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        ArtistType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        //Define data
        $dataset = [
            [
                'firstname' => 'Daniel',
                'lastname' => 'Marcelin',
                'type' => ['auteur', 'comédien', 'scenographe'],
            ],

            [
                'firstname' => 'Philipe',
                'lastname' => 'Laurent',
                'type' => ['auteur'],

            ],
        ];


        foreach ($dataset as &$record) {
            $artist = Artist::where([
                ['firstname', '=', $record['firstname']],
                ['lastname', '=', $record['lastname']],
            ])->first();


            if (!is_array($record['type'])) {
                $record['type'] = [$record['type']]; // Assurez-vous que c'est un tableau
            }

            foreach ($record['type'] as $typeName) {
                $type = Type::where('type', '=', $typeName)->first();

                if ($artist && $type) {
                    ArtistType::create([
                        'artist_id' => $artist->id,
                        'type_id' => $type->id,
                    ]);
                }
            }
        }
    }
}
