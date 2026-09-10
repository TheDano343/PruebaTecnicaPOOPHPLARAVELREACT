<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'descripcion' => $this->faker->paragraph(),
            'usuario_id' => $this->faker->numberBetween(1,10),
            'completed' => $this->faker->boolean()
        ];
    }
}
