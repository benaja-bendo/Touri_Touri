<?php

namespace Database\Seeders;

use App\Models\Site;
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
        // \App\Models\User::factory(10)->create();
         \App\Models\Departement::factory(10)->create()->each(
            fn ($departement)=>$departement->site()->saveMany(Site::factory(5)->make())
         );
    }
}
