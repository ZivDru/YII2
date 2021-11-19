<?php

namespace app\modules\album\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

class Album extends ActiveRecord
{
    /**
     * Table name
     *
     * @return string
     */
    public static function tableName()
    {
        return 'albums';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Related user id',
            'title' => 'Title',
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
        $fields = ['id', 'title'];

        if (!empty($action = Yii::$app->controller->action->id) && $action === 'view')
        {
            $fields[] = 'photos';
        }

        return $fields;
    }

    /**
     * Relation to photos
     *
     * @return ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['album_id' => 'id']);
    }
}
