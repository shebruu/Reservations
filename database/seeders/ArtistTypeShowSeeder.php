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

        //Prepare the data
        foreach ($artistTypeShows as $data) {
            // Vérifiez si l'artiste existe
            $artistExists = Artist::where('firstname', $data['firstname'])->where('lastname', $data['lastname'])->exists();

            // Vérifiez si le type existe
            $typeExists = Type::where('type', $data['type'])->exists();

            // Vérifiez si le spectacle existe
            $showExists = Show::where('slug', $data['show_slug'])->exists();

            if ($artistExists && $typeExists && $showExists) {
                // Obtenez les IDs nécessaires
                $artist = Artist::where('firstname', $data['firstname'])->where('lastname', $data['lastname'])->first();
                $type = Type::where('type', $data['type'])->first();
                $show = Show::where('slug', $data['show_slug'])->first();

                // Créez ou trouvez la relation artist_type
                $artistType = ArtistType::firstOrCreate([
                    'artist_id' => $artist->id,
                    'type_id' => $type->id,
                ]);

                // Préparez les données pour l'insertion
                $insertData = [
                    'artist_type_id' => $artistType->id,
                    'show_id' => $show->id,
                ];

                // Insérez les données dans 'artist_type_show'
                DB::table('artist_type_show')->insert($insertData);


                Log::info('Insertion réussie dans artist_type_show', $insertData);
            } else {
                // Logique pour gérer l'absence d'artiste, de type ou de spectacle
                Log::warning("Élément manquant pour l'insertion", ['artist' => $data['firstname'] . ' ' . $data['lastname'], 'type' => $data['type'], 'show' => $data['show_slug']]);
            }
        }
    }
}
