<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Article;
use app\models\Biography;
use app\models\Portfolio;
use yii\data\Pagination;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        $query = Article::find();

       $pagination = new Pagination([
           'defaultPageSize' => 10,
           'totalCount' => $query->count(),
       ]);

       $article = $query->offset($pagination->offset) //add order by date after tests
           ->limit($pagination->limit)
           ->all();

       return $this->render('index', [
           'articles' => $article,
           'pagination' => $pagination,
       ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public function actionPost($id)
    {
         $request = Yii::$app->request;
         $query = Article::find()->where(['article_id' => $id])->one();
         return $this->render('post',[
             'post' => $query
         ]);
    }
    public function actionBiography()
    {
        $query = Biography::findOne(1);
        return $this->render('biography', [
            'biography' => $query
        ]);
    }
    public function actionPortfolio(){
        $query = Portfolio::find()->all();
        return $this->render('portfolio', [
            'portfolio' => $query
        ]);
    }
}
