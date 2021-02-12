<?php

use App\Category;

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\News::class, 20)->create()->each(function($news) {
            $news->categories()->attach(
                Category::inRandomOrder()->limit(rand(0, 5))->get()
            );
        });
    }
}
