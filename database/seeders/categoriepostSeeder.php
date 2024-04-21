<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;
use App\Models\Post;

class categoriepostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        categoriepost::factory(5)->create();
    }
}
