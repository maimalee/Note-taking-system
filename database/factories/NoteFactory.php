<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'user_id'=>mt_rand(1,10),
            'title'=>$this->faker->sentence,
            'content'=>implode(',', $this->faker->sentences('5')),
            'status'=>mt_rand(0,2),

        ];
    }
}
