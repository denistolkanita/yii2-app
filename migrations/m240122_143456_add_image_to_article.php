<?php

use yii\db\Migration;

/**
 * Class m240122_143456_add_image_to_articles
 */
class m240122_143456_add_image_to_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article', 'image', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('article', 'image');
    }
}
