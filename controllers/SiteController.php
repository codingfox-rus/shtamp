<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Pages;
use app\models\Catalog;
use app\models\Novelties;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['novelties', 'logout', 'admin'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['novelties'],
                        'allow' => true,
                        'roles' => ['user']
                    ],
                    [
                        'actions' => ['admin'],
                        'allow' => true,
                        'roles' => ['admin']
                    ]
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

    public function actionIndex($url = '')
    {
        $page = Pages::findOne(['url' => $url]);
        return $this->render('index', [
            'page' => $page
        ]);
    }

    public function actionCatalog()
    {
        $page = Pages::findOne(['url' => 'catalog']);
        $images = Catalog::find()->where(['published' => true])->orderBy('image desc')->all();

        return $this->render('catalog', [
            'page' => $page,
            'images' => $images
        ]);
    }

    public function actionNovelties()
    {
        $page = Pages::findOne(['url' => 'novinki']);
        $images = Novelties::find()->where(['published' => true])->orderBy('image desc')->all();

        return $this->render('novelties', [
            'page' => $page,
            'images' => $images
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
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

    public function actionDebugLogout()
    {
        Yii::$app->user->logout();
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

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAdmin()
    {
        return $this->render('index');
    }
}
