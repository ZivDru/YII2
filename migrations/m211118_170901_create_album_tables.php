<?php

use yii\db\Migration;

/**
 * Class m211118_170901_create_album_tables
 */
class m211118_170901_create_album_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('albums', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'created_at' => $this->dateTime() . ' DEFAULT NOW()',
            'updated_at' => $this->dateTime() . ' DEFAULT NOW()'
        ]);

        $this->addForeignKey(
            'fk-album-user_id',
            'albums',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->createTable('photos', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'created_at' => $this->dateTime() . ' DEFAULT NOW()',
            'updated_at' => $this->dateTime() . ' DEFAULT NOW()'
        ]);

        $this->addForeignKey(
            'fk-photo-album_id',
            'photos',
            'album_id',
            'albums',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('albums');
        $this->dropTable('photos');
    }
}
