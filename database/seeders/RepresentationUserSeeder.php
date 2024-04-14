<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;
use App\Models\Representation;
use App\Models\User;

class RepresentationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Schema::disableForeignKeyConstraints();
        DB::table('reservations')->delete();
        Schema::enableForeignKeyConstraints();


        $representationUsersData = [
            [
                'user_login' => 'johny4',
                'show_title' => 'ayiti',
                'representation_when' => '2012-10-12 13:30',
                'places' => 2
            ],
            [
                'user_login' => 'alice2024',
                'show_title' => 'ayiti',
                'representation_when' => '2012-10-12 13:30',
                'places' => 1
            ],

            [
                'user_login' => 'wysky3',
                'show_title' => 'Cible mouvante',
                'representation_when' => '2012-10-02 20:30',
                'places' => 3
            ],
            [
                'user_login' => 'bob2024',
                'show_title' => 'cible-mouvante',
                'representation_when' => '2012-10-09 20:30',
                'places' => 2
            ],
            [
                'user_login' => 'ebsahin',
                'show_title' => 'Manneke… !',
                'representation_when' => '2012-10-12 20:30',
                'places' => 2
            ],

        ];


        foreach ($representationUsersData as $data) {
            $userId = DB::table('users')->where('login', $data['user_login'])->value('id');
            $representationId = DB::table('representations')
                ->join('shows', 'representations.show_id', '=', 'shows.id')
                ->where('shows.title', $data['show_title'])
                ->where('representations.when', $data['representation_when'])
                ->value('representations.id');

            if ($userId && $representationId) {
                DB::table('reservations')->insert(
                    [
                        'user_id' => $userId,
                        'representation_id' => $representationId,

                        'places' => $data['places']
                    ]
                );
            }
        }
    }
}
