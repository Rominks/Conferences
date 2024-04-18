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
                'content' => Lorem::sentence(20),
                'created_at' => date('Y/m/d H:i:s', time()),
                'updated_at' => date('Y/m/d H:i:s', time())
            ],
            [
                'title' => Lorem::sentence(5),
                'content' => Lorem::sentence(15),
                'created_at' => date('Y/m/d H:i:s', time()),
                'updated_at' => date('Y/m/d H:i:s', time())
            ],
            [
                'title' => Lorem::sentence(7),
                'content' => Lorem::sentence(20),
                'created_at' => date('Y/m/d H:i:s', time()),
                'updated_at' => date('Y/m/d H:i:s', time())
            ]
        ]);
    }
}
