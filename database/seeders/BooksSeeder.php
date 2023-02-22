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
            'author_id' => rand(1, 2),
            'image_path' => 'public/image/AjV6g1sOzIM4rT4NiRxQ1NtFkA4IiO69wX5Qqr89.jpg',
            'text' => 'Очень много текста, прямо совсем много текста из головы.',
            'category_id' => rand(1, 5)
        ]);
    }
}
