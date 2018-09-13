<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'title' => str_random(10),
            'desc' => str_random(300)
        ]);
        factory(App\Project::class, 50)->create();
    }
}
