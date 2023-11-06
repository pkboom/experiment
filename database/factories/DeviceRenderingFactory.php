<?php

namespace Database\Factories;

use App\Models\DeviceRendering;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceRenderingFactory extends Factory
{
    public function definition(): array
    {
        return [
           'uuid' => $this->faker->uuid(),
           'device_id' => $this->faker->randomElement([1, 2, 3]),
           'rendering_id' => $this->faker->numberBetween(1000, 9000),
           'created_at' => $this->faker->dateTimeBetween('-10 days', 'now'),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(
            fn (DeviceRendering $deviceRendering) =>
            $deviceRendering->rendering_completed_at = $deviceRendering->created_at->addSeconds($this->faker->numberBetween(50, 250))
        );
    }
}
