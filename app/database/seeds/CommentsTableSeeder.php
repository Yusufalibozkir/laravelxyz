<?php
class CommentsTableSeeder extends Seeder{
    public function run(){
        $faker = Faker\Factory::create();

        Comments::truncate();

        for($i = 0; $i<20; $i++){
            $posts = Comments::create(array(
                'user_id' => rand(1,2),
                'content' => $faker->realText(rand(250,300)),
                'post_id' => rand(1,5)
            ));
        }
    }
}