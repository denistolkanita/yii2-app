<?php

use app\models\Article;
use yii\db\Migration;

/**
 * Class m240124_084314_seed_articles
 */
class m240124_084314_seed_articles extends Migration
{
    private const SEEDS_NUMBER = 20;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach (range(1, self::SEEDS_NUMBER) as $index) {
            $article = new Article();
            $article->title = 'title-' . $index;
            $article->author_id = $index;
            $article->text = 'text- ' . $index;
            $article->alias = 'title-' . $index;

            $article->save();
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach (range(1, self::SEEDS_NUMBER) as $index) {
            $article = Article::find()->where([
                'title' => 'title-' . $index,
                'author_id' => $index,
                'alias' => 'title-' . $index
            ])->one();

            if ($article) {
                $article->delete();
            }
        }
    }
}
