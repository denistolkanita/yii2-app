<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tags}}`.
 */
class m240126_143126_create_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tags}}', [
            'id' => $this->primaryKey(),
            'tag' => $this->string(200),
            'user_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'user_id',
            'tags',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tags}}');
        $this->dropForeignKey(
            'user_id',
            'tags'
        );
    }
}
