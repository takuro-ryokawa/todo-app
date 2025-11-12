<?php

namespace Database\Factories;

use App\Models\TodoList;
use App\Models\TodoListIndex;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TodoList>
 */
class TodoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'todo_list_index_id' => TodoListIndex::factory(),
            'body' => $this->faker->sentence(3),
            'flag' => $this->faker->numberBetween(0, 1),
        ];
    }
}
