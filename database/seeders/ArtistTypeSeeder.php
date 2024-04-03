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
                'type' => 'auteur',
            ],
            [
                'firstname' => 'Philippe',
                'lastname' => 'Laurent',
                'type' => 'auteur',
            ],
            [
                'firstname' => 'Daniel',
                'lastname' => 'Marcelin',
                'type' => 'scénographe',
            ],
            [
                'firstname' => 'Philippe',
                'lastname' => 'Laurent',
                'type' => 'scénographe',
            ],
            [
                'firstname' => 'Daniel',
                'lastname' => 'Marcelin',
                'type' => 'comédien',
            ],
            [
                'firstname' => 'Marius',
                'lastname' => 'Von Mayenburg',
                'type' => 'auteur',
            ],
            [
                'firstname' => 'Olivier',
                'lastname' => 'Boudon',
                'type' => 'scénographe',
            ],
            [
                'firstname' => 'Anne Marie',
                'lastname' => 'Loop',
                'type' => 'comédien',
            ],
            [
                'firstname' => 'Pietro',
                'lastname' => 'Varasso',
                'type' => 'comédien',
            ],
            [
                'firstname' => 'Laurent',
                'lastname' => 'Caron',
                'type' => 'comédien',
            ],
            [
                'firstname' => 'Élena',
                'lastname' => 'Perez',
                'type' => 'comédien',
            ],
            [
                'firstname' => 'Guillaume',
                'lastname' => 'Alexandre',
                'type' => 'comédien',
            ],
            [
                'firstname' => 'Claude',
                'lastname' => 'Semal',
                'type' => 'auteur',
            ],
            [
                'firstname' => 'Laurence',
                'lastname' => 'Warin',
                'type' => 'scénographe',
            ],
            [
                'firstname' => 'Claude',
                'lastname' => 'Semal',
                'type' => 'comédien',
            ],
            [
                'firstname' => 'Pierre',
                'lastname' => 'Wayburn',
                'type' => 'auteur',
            ],
            [
                'firstname' => 'Gwendoline',
                'lastname' => 'Gauthier',
                'type' => 'auteur',
            ],
            [
                'firstname' => 'Philippe',
                'lastname' => 'Laurent',
                'type' => 'scénographe',
            ],
            [
                'firstname' => 'Pierre',
                'lastname' => 'Wayburn',
                'type' => 'comédien',
            ],
            [
                'firstname' => 'Gwendoline',
                'lastname' => 'Gauthier',
                'type' => 'comédien',
            ],
        ];



        foreach ($dataset as &$record) {
            $artist = Artist::where([
                ['firstname', '=', $record['firstname']],
                ['lastname', '=', $record['lastname']],
            ])->first();


            if (!is_array($record['type'])) {
                $record['type'] = [$record['type']];
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
