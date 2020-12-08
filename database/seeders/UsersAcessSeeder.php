<?php

namespace Database\Seeders;

use App\Models\UserAcess;
use Illuminate\Database\Seeder;

class UsersAcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAcess::factory()->count(18000)->create();
    }
}
