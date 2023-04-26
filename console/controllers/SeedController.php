<?php

namespace console\controllers;

use yii\console\Controller;
use yii\console\ExitCode;
use common\models\Post;
use Faker\Factory;

class SeedController extends Controller
{
    public function actionPost()
    {
        $faker = Factory::create();

        for($i = 0; $i < 10; $i++)
        {
          $post = new Post();
          $post->user_id = $faker->numberBetween(1, 3);
          $post->title = $faker->text(30);
          $post->content = $faker->text(rand(200, 300));
          $post->save(false);
        }

        echo "Data generation is complete!\n";

        return ExitCode::OK;
    }
}