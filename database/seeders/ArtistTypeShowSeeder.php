<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\Artist;
use App\Models\Type;
use App\Models\ArtistType;
use App\Models\Show;


class ArtistTypeShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('artist_type_show')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $artistTypeShows = [
            [
                'firstname' => 'Daniel',
                'lastname' => 'Marcelin',
                'type' => 'auteur',
                'show_slug' => 'ayiti',
            ],
            [
                'firstname' => 'Philippe',
                'lastname' => 'Laurent',
                'type' => 'auteur',
                'show_slug' => 'ayiti',
            ],
            [
                'firstname' => 'Daniel',
                'lastname' => 'Marcelin',
                'type' => 'scénographe',
                'show_slug' => 'ayiti',
            ],
            [
                'firstname' => 'Philippe',
                'lastname' => 'Laurent',
                'type' => 'scénographe',
                'show_slug' => 'ayiti',
            ],
            [
                'firstname' => 'Daniel',
                'lastname' => 'Marcelin',
                'type' => 'comédien',
                'show_slug' => 'ayiti',
            ],
            [
                'firstname' => 'Marius',
                'lastname' => 'Von Mayenburg',
                'type' => 'auteur',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'firstname' => 'Olivier',
                'lastname' => 'Boudon',
                'type' => 'scénographe',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'firstname' => 'Anne Marie',
                'lastname' => 'Loop',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'firstname' => 'Pietro',
                'lastname' => 'Varasso',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'firstname' => 'Laurent',
                'lastname' => 'Caron',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'firstname' => 'Élena',
                'lastname' => 'Perez',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'firstname' => 'Guillaume',
                'lastname' => 'Alexandre',
                'type' => 'comédien',
                'show_slug' => 'cible-mouvante',
            ],
            [
                'firstname' => 'Claude',
                'lastname' => 'Semal',
                'type' => 'auteur',
                'show_slug' => 'ceci-nest-pas-un-chanteur-belge',
            ],
            [
                'firstname' => 'Laurence',
                'lastname' => 'Warin',
                'type' => 'scénographe',
                'show_slug' => 'ceci-nest-pas-un-chanteur-belge',
            ],
            [
                'firstname' => 'Claude',
                'lastname' => 'Semal',
                'type' => 'comédien',
                'show_slug' => 'ceci-nest-pas-un-chanteur-belge',
            ],
            [
                'firstname' => 'Pierre',
                'lastname' => 'Wayburn',
                'type' => 'auteur',
                'show_slug' => 'manneke',
            ],
            [
                'firstname' => 'Gwendoline',
                'lastname' => 'Gauthier',
                'type' => 'auteur',
                'show_slug' => 'manneke',
            ],
            [
                'firstname' => 'Philippe',
                'lastname' => 'Laurent',
                'type' => 'scénographe',
                'show_slug' => 'manneke',
            ],
            [
                'firstname' => 'Pierre',
                'lastname' => 'Wayburn',
                'type' => 'comédien',
                'show_slug' => 'manneke',
            ],
            [
                'firstname' => 'Gwendoline',
                'lastname' => 'Gauthier',
                'type' => 'comédien',
                'show_slug' => 'manneke',
            ],
        ];


        foreach ($artistTypeShows as $data) {

            $artistId = DB::table('artists')
                ->where('firstname', $data['firstname'])
                ->where('lastname', $data['lastname'])
                ->value('id');

            $typeId = DB::table('types')
                ->where('type', $data['type'])
                ->value('id');

            $showId = DB::table('shows')
                ->where('slug', $data['show_slug'])
                ->value('id');

            if ($artistId && $typeId && $showId) {

                $artistTypeId = ArtistType::firstOrCreate([
                    'artist_id' => $artistId,
                    'type_id' => $typeId,
                ]);

                DB::table('artist_type_show')->insert([
                    'artist_type_id' => $artistTypeId->id,
                    'show_id' => $showId,
                ]);
            }
        }
    }
}
