<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::query()->create(['name' => 'Nature']);
        Categories::query()->create(['name' => 'Development']);
        Categories::query()->create(['name' => 'News']);
        Categories::query()->create(['name' => 'IT']);
        Categories::query()->create(['name' => 'Study']);
    }
}
