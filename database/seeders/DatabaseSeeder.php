<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create mock models if not exists
        if(! \App\Models\User::first()){
        \App\Models\User::factory(10)->has(\App\Models\Post::factory()->count(3))->create()
        ->each(
          function($user){
              $user->can_see_content_groups()->attach(\App\Models\ContentGroup::all()->random(3));
            }
        );
        }
        // make oauth clients
        (new OauthClientsStaticDef)->run();
    }
}
