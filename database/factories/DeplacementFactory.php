<?php

namespace Database\Factories;

use App\Models\Deplacement;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeplacementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deplacement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->text,
            'type'=>'terreste',
            'image_path'=>$this->faker->imageUrl(),
            'etat'=>'bon',
            'site_id'=>'bon',
        ];
    }
}
