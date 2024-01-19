<?php

namespace app\controllers;

use app\models\Articles;
use yii\web\Controller;
use Yii;

class ArticlesController extends Controller
{
    public function actionArticles()
    {
        $articles = Articles::find()->all();

        return $this->render('articles', [
            'articles' => $articles,
        ]);
    }

    public function actionArticle()
    {
        $article = Articles::find()->where(['id' => Yii::$app->request->get()['id']])->one();
        ++$article->hits;
        $article->save();

        return $this->render('article', [
            'article' => $article
        ]);
    }

}