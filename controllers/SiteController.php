<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Method with some examples with ActiveRecord usage
     */
    public function actionActiveRecord()
    {
//        $article = Article::find()->select(['id', 'title', 'alias'])->all();
//        $article = Article::findOne(1); // [ $id = 1 ]
//        $article = Article::find()->where(['alias' => 'title-3'])->all();
//        $article = Article::find()->where(['alias' => 'title-4'])->orWhere(['id' => '27'])->all();
//        $article = Article::find()->where(['alias' => 'title-1'])->andWhere(['id' => '1'])->all();
//        $article = Article::find()->orderBy('author_id')->all();
//        $article = Article::find()->one();
//        $articles = Article::findBySql("SELECT * FROM `article`")->all();

        $query = new Query;
        $query->select('tags.id, tags.tag, user.id as user_id, user.name, user.age')
            ->from('tags')
            ->leftJoin('user', 'tags.user_id = user.id');

        $command = $query->createCommand()->queryAll();

        // pretty print in Yii2
        highlight_string("<?php\n\$articles =\n" . var_export($command, true) . ";\n?>");
        die();
    }

}
