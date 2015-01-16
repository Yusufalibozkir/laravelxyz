<?php
class PostsTableSeeder extends Seeder{
    public function run(){
        $faker = Faker\Factory::create();

        Posts::truncate();

        for($i = 0; $i<5; $i++){
            $posts = Posts::create(array(
                'title' => $faker-> realText(rand(20,50)),
                'content' => $faker-> realText(rand(200,500)),
                'user_id' => 1
            ));
        }
    }
}