<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new Article())->insert([
           [
               'title' => Lorem::sentence(3),
               'content' => Lorem::sentence(20)
           ],
           [
               'title' => Lorem::sentence(5),
               'content' => Lorem::sentence(15)
           ],
            [
                'title' => Lorem::sentence(2),
                'content' => Lorem::sentence(10)
            ]
        ]);
    }
}
