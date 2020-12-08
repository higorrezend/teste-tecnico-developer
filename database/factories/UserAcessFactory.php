<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserAcess;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserAcessFactory extends Factory
{
    
    protected $model = UserAcess::class;

    public function definition()
    {
        return [
            'last_login' => $this->faker->dateTimeBetween('2020-11-01', '2020-11-08'),
            'Users_id' => User::find($this->faker->numberBetween(1, 8000))->id
        ];
    }
}
