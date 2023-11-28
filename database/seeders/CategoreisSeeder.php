<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoreisSeeder extends Seeder
{
    protected $model;
    function __construct()
    {
        $this->model = new Category();
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->model->factory(5)->create();
    }
}
