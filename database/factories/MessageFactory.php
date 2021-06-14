<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'body' => $this->faker->sentence,
           'scope_website' => $this->faker->boolean(),
           'scope_app' => $this->faker->boolean(),
           'scope_rss' => $this->faker->boolean(),
        ];
    }
}
