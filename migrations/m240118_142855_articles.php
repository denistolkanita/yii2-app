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
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200),
            'text' => $this->string(),
            'author_id' => $this->integer(),
            'alias' => $this->string(200),
            'date' => $this->date("Y-m-d"),
            'likes' => $this->integer(),
            'hits' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%articles}}');
    }
}
