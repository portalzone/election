<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Polling>
 */
class PollingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'polling_name' => $this ->faker->pollingName,
            'state_id'  => $this ->faker->stateId,
            'lga_id'  => $this ->faker->lgaId,
            'ward_id'  => $this ->faker->wardId,
        ];
    }
}
