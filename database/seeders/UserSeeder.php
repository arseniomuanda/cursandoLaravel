<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    protected $model;
    protected $faker;
    function __construct()
    {
        $this->model = new User();
        $this->faker = \Faker\Factory::create();
    }

    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $this->model->create([
                'name' => $this->faker->name,
                'email' => $this->faker->unique()->safeEmail,
                'password' => bcrypt('12345'),
            ]);
        }
        
    }
}
