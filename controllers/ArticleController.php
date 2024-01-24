<?php

namespace app\controllers;

use app\models\Article;
use yii\base\InvalidConfigException;
use yii\base\InvalidRouteException;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

class ArticleController extends Controller
{
    /*
     * path_example: web/img/article-id.image-extention
     */
    private const IMAGE_FOLDER = 'img';
    /**
     * @throws InvalidRouteException
     * @throws InvalidConfigException
     */
    public function actionEdit()
    {
        if (Yii::$app->request->isGet) {
            $article = Article::find()->where(['id' => Yii::$app->request->get()['id']])->one();

            return $this->render('edit', [
                'article' => $article
            ]);
        }

        if (Yii::$app->request->isPost) {
            $postArticle = Yii::$app->request->post()['Article'];
            $articleId = Yii::$app->request->get()['id'];
            $article = Article::find()->where(['id' => $articleId])->one();

            foreach($postArticle as $field => $value) {
                $article->$field = $value;
            }

            $article->save();

            Yii::$app->getResponse()->redirect(Yii::$app->getRequest()->getUrl());
        }
    }

    public function actionCreate()
    {
        if (Yii::$app->request->isGet) {
            return $this->render('create');
        }

        if (Yii::$app->request->isPost) {
            $article = new Article();
            $postArticle = Yii::$app->request->post()['Article'];

            foreach($postArticle as $field => $value) {
                $article->$field = $value;
            }
            $article->save();

            if ($_FILES['Article']['name']['image']) {
                $image = UploadedFile::getInstance($article, 'image');

                if ($image) {
                    $article->image = $article->getPrimaryKey() . '.' . str_replace('image/', '', $image->type);
                    $image->saveAs(self::IMAGE_FOLDER . '/' . $article->image);
                    $article->save();
                }
            }

        }
    }

    public function actionArticles()
    {
        $articles = Article::find()->all();

        return $this->render('articles', [
            'articles' => $articles,
        ]);
    }

    public function actionArticle()
    {
        $article = Article::find()->where(['id' => Yii::$app->request->get()['id']])->one();
        ++$article->hits;
        $article->save();

        return $this->render('article', [
            'article' => $article
        ]);
    }
}