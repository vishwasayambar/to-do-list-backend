<?php

namespace Database\Factories;

use App\Models\Crad;
use Illuminate\Database\Eloquent\Factories\Factory;

class CradFactory extends Factory
{
    protected $model = Crad::class;

    public function definition(): array
    {
        return [
            'heading'      => $this->faker->word(),
            'workspace_id' => $this->faker->randomNumber(),
        ];
    }
}
