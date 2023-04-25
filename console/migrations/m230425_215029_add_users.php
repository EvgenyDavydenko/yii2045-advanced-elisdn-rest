<?php

use yii\db\Migration;

/**
 * Class m230425_215029_add_users
 */
class m230425_215029_add_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'username' => 'vasya',
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('vasya'),
            'email' => 'vasya@mail.loc',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time(),
            'description' => 'Личная информация Васи'
        ]);

        $this->insert('{{%user}}', [
            'username' => 'fedya',
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('fedya'),
            'email' => 'fedya@mail.loc',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time(),
            'description' => 'Личная информация Феди'
        ]);

        $this->insert('{{%user}}', [
            'username' => 'masha',
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('masha'),
            'email' => 'masha@mail.loc',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time(),
            'description' => 'Личная информация Маши'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', 'username = "admin"');
        $this->delete('{{%user}}', 'username = "user"');
    }
}
