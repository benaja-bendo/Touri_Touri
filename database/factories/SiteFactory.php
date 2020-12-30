<?php

namespace Database\Factories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Site::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(),
            'description' => $this->faker->realText(),
            'imageP_path' => $this->faker->imageUrl(),
            'prix' => $this->faker->numberBetween(1000,100000),
            'santer_securite' => $this->faker->realText(),
        ];
    }
}
