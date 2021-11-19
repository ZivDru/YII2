<?php

namespace app\modules\album\models;

use Yii;
use yii\db\ActiveRecord;

class Photo extends ActiveRecord
{
    /**
     * Table name
     *
     * @return string
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'album_id' => 'Related album id',
            'title' => 'Title',
            'url' => 'Photo src',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At'
        ];
    }

    /**
     * Model fields
     *
     * @return string[]
     */
    public function fields()
    {
        return ['id', 'title', 'fullUrl'];
    }

    /**
     * Url getter
     *
     * @return mixed|null
     */
    public function getFullUrl()
    {
        return Yii::$app->params['uploadPath'] . DIRECTORY_SEPARATOR . 'default_images' . DIRECTORY_SEPARATOR . $this->url;
    }
}
