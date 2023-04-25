<?php

use yii\db\Migration;

/**
 * Class m230425_214603_add_profile_fields
 */
class m230425_214603_add_profile_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'description', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'description');
    }
}
