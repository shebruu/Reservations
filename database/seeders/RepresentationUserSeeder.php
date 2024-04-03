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
        DB::table('representation_user')->delete();
        Schema::enableForeignKeyConstraints();


        $representationUsersData = [
            [
                'user_login' => 'johny4',
                'show_title' => 'ayiti',
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
                DB::table('representation_user')->updateOrInsert(
                    [
                        'user_id' => $userId,
                        'representation_id' => $representationId,
                    ],
                    [
                        'places' => $data['places']
                    ]
                );
            }
        }
    }
}
