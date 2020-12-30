<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\Deplacement;
use App\Models\Galerie;
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
//         Departement::factory(10)->create()->each(
//            fn ($departement)=>$departement->site()->saveMany(Site::factory(5)->make())
//         );
//         Galerie::factory(100)->create();

        Deplacement::factory(20)->create();
    }
}
