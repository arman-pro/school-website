<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => "Lorem, ipsum dolor sit amet",
            'subtitle' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, id!",
            'thumbnail' => 'dumy.jpg',
            'description' => $this->faker->text($maxNbChars = 300)
        ];
    }
}
