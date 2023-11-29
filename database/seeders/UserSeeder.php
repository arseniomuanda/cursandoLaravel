<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    protected $model;
    function __construct()
    {
        $this->model = new User();
    }


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->model->factory(34)->create();
    }
}
