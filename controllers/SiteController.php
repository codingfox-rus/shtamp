<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Pages;
use app\models\Catalog;
use app\models\Novelties;
use app\models\Tag;

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

    public function actionIndex()
    {
        $page = Pages::findOne(['url' => '']);
        return $this->render('index', [
            'page' => $page
        ]);
    }

    public function actionPage($url = '')
    {
        $page = Pages::findOne(['url' => $url]);
        return $this->render('page', [
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
        $page = Pages::findOne(['url' => 'contact']);
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            $to = Yii::$app->params['adminEmail'];
            $from = Yii::$app->params['contactEmail'];

            Yii::$app->mailer->compose()
                ->setTo($to)
                ->setFrom([$from => Yii::$app->name])
                ->setSubject($model->subject)
                ->setTextBody($model->message)
                ->send();

            return $this->refresh();
        }
        return $this->render('contact', [
            'page' => $page,
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAdmin()
    {
        $this->layout = 'admin';
        return $this->render('admin');
    }

    /**
     * @return string
     */
    public function actionGetTagCloud()
    {
        $tags = Tag::find()->all();

        return json_encode([
            'html' => $this->renderPartial('_partials/tag-cloud', compact('tags'))
        ], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionSearchByTag($id)
    {
        $tag = Tag::findOne($id);
        if ( !empty($tag->pages) ) {
            $pages = ArrayHelper::map($tag->pages, 'url', 'title');
            return $this->render('search-by-tag', compact('tag', 'pages'));
        } else {
            return $this->render('search-by-tag', compact('tag'));
        }
    }

    /**
     * @param $data
     */
    public function dd($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }

    /*public function actionTest()
    {
        return $this->render('test');
    }*/
}
