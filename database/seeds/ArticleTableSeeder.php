<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('articles')->insert([
        'title' => str_random(10),
        'desc' => str_random(100)
      ]);
      factory(App\Article::class, 50)->create();

    }
}
