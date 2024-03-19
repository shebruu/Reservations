<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Location;
use App\Models\Locality;


class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Location::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $locations = [
            [
                'slug' => null,
                'designation' => 'Espace Delvaux / La Vénerie',
                'address' => '3 rue Gratès',
                'locality_postal_code' => '1170',
                'website' => 'https://www.lavenerie.be',
                'phone' => '+32 (0)2/663.85.50',
            ],
            [
                'slug' => null,
                'designation' => 'Dexia Art Center',
                'address' => '50 rue de l\'Ecuyer',
                'locality_postal_code' => '1000',
                'website' => null,
                'phone' => null,
            ],
            [
                'slug' => null,
                'designation' => 'La Samaritaine',
                'address' => '16 rue de la samaritaine',
                'locality_postal_code' => '1000',
                'website' => 'http://www.lasamaritaine.be/',
                'phone' => null,
            ],
            [
                'slug' => null,
                'designation' => 'Espace Magh',
                'address' => '17 rue du Poinçon',
                'locality_postal_code' => '1000',
                'website' => 'http://www.espacemagh.be',
                'phone' => '+32 (0)2/274.05.10',
            ],
        ];

        //Insert data in the table
        foreach ($locations as &$data) {
            $postalCode = $data['locality_postal_code'];
            //Recherche de la localité correspondant au code postal
            $locality = Locality::firstWhere('postal_code', $postalCode);

            unset($data['locality_postal_code']);
            if ($locality) {


                $data['slug'] = Str::slug($data['designation'], '-');
                $data['locality_id'] = $locality->id; // Référence à la table localities
            } else {


                throw new \Exception("Localité non trouvée pour le code postal: {$postalCode}");
            }
        }

        DB::table('locations')->insert($locations);
    }
}
