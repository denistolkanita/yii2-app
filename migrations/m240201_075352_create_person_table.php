<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%person}}`.
 */
class m240201_075352_create_person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%person}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'age' => $this->integer(),
            'email' => $this->string(100),
            'country' => $this->string(50),
            'tags' => $this->string(200)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%person}}');
    }
}
