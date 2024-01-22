<?php

use yii\db\Migration;

/**
 * Class m240118_142855_articles
 */
class m240118_142855_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200),
            'text' => $this->text(),
            'author_id' => $this->integer(),
            'alias' => $this->string(200),
            'date' => $this->timestamp()->defaultExpression('NOW()'),
            'likes' => $this->integer()->defaultValue(0),
            'hits' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
