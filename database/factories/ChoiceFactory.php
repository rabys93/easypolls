<?php

namespace Database\Factories;

use App\Models\Choice;
use App\Models\Poll;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Choice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'choice_votes' => $this->faker->numberBetween(1,10),
            'poll_id' => $this->faker->randomElement(Poll::pluck('id')->toArray()),
        ];
    }
}
