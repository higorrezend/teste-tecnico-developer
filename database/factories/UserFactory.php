<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{

    protected $model = User::class;

    public function definition ()
    {
        $name = $this->faker->unique()->name;
        $email = $this->getEmailByName($name);
        return [
            'name' => $name,
            'email' => $email,
            'active' => $this->faker->randomElement([true, false])
        ];
    }

    private static function getEmailByName ($name) {
        $body = strtolower(trim(preg_replace('~[^0-9a-z]+~i', '_', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($name, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '_'));
        $domain = 'dealersites.com.br';
        return $body . '@' . $domain;
	}
}
