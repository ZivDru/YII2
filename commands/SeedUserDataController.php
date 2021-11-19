<?php

namespace app\commands;

use Yii;
use yii\console\ExitCode;
use yii\console\Controller;
use app\modules\user\models\User;
use Faker\Factory as FakerFactory;
use app\modules\album\models\Album;
use app\modules\album\models\Photo;

class SeedUserDataController extends Controller
{
    public function actionIndex()
    {
        try {
            $faker = FakerFactory::create();

            for ($i = 1; $i <= 11; $i++) {
                // Create user
                $user = new User();
                $user->username = $i === 1 ? 'admin' : $faker->unique()->username;
                $user->first_name = $faker->firstName;
                $user->last_name = $faker->lastName;
                $user->generateAuthKey();
                if($i === 1) {
                    $user->setPassword('admin');
                } else {
                    $user->setPassword(!empty($pass = Yii::$app->params['userPasswords'][$i]) ? $pass : $faker->password);
                }
                $user->save();

                // Create albums for the user
                for ($s = 1; $s <= 10; $s++) {
                    $album = new Album();
                    $album->title = $faker->title;
                    $album->user_id = $user->id;
                    $album->save();

                    // Create photo for album
                    for ($m = 1; $m <= 10; $m++) {
                        $photo = new Photo();
                        $photo->title = $faker->title;
                        $photo->album_id = $album->id;

                        $path = Yii::$app->params['uploadPath'] . DIRECTORY_SEPARATOR . 'default_images' . DIRECTORY_SEPARATOR;
                        $files = glob($path . '*.*');
                        $file = !empty($files) ? array_rand($files) : null;

                        $photo->url = !empty($fullPath = $files[$file]) ? str_replace($path, '', $fullPath) : '';

                        $photo->save();
                    }
                }
            }

            echo "User data have been successfully seeded";
            return ExitCode::OK;
        } catch (\Throwable $e) {
            echo "A problem occurred! \n" . $e->getMessage() . ' \n';
            return ExitCode::UNSPECIFIED_ERROR;
        }
    }
}