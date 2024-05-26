<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Show;
use App\Models\Tag;

class ShowTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $shows = Show::all();

        foreach ($shows as $show) {
            $tags = [];

            // Associer des tags spécifiques en fonction du titre ou de la description
            switch ($show->title) {
                case 'Ayiti':
                    $tags = ['Drama'];
                    break;
                case 'Cible mouvante':
                    $tags = ['Thriller', 'Action'];
                    break;
                case 'Ceci n\'est pas un chanteur belge':
                    $tags = ['Comedy', 'Musical'];
                    break;
                case 'Manneke… !':
                    $tags = ['Comedy', 'Family'];
                    break;
                default:
                    $tags = ['Drama'];
                    break;
            }

            // Récupérer les IDs des tags pertinents
            $tagIds = Tag::whereIn('name', $tags)->pluck('id');

            // Associer les tags au show
            $show->tags()->attach($tagIds);
        }
    }
}
