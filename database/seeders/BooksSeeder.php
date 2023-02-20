<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Books::query()->create([
            'name'=> 'First book',
            'author_id' => rand(1, 2)
        ]);

        Books::query()->create([
            'name'=> 'New book',
            'author_id' => rand(1, 2)
        ]);

        Books::query()->create([
            'name'=> 'Old book',
            'author_id' => rand(1, 2)
        ]);
    }
}
