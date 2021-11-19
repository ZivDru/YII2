<?php

namespace app\modules\api\controllers;

use yii\web\Response;
use yii\rest\ActiveController;
use yii\filters\ContentNegotiator;

class UsersController extends ActiveController
{
    public $modelClass = 'app\modules\user\models\User';

    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' =>Response::FORMAT_JSON,
                ],
            ],
        ];
    }
}