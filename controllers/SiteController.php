<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Post;
use app\models\Comments;
use app\models\Messages;

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
        if (Yii::$app->user->isGuest) {
            return $this->render('index');
        } else {
            $model = new Post();
            $post_type = Yii::$app->request->get('post_type');
            if ($post_type == 0) {
                $query = $model::find()->orderBy('tanggal desc')->all();
            } else {
                $query = $model::find()->where(['tipe' => $post_type-1])->orderBy('tanggal desc')->all();
            }
            return $this->render('timeline', [
                'posts' => $query,
            ]);
        }
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

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionMessage()
    {
        $model = new Messages();
        $id = Yii::$app->request->get('id');

        if ($id == 0) { // pesan masuk
            $query = $model::find()->where(['ke' => Yii::$app->user->identity->username])->orderBy('tanggal desc')->all();
            return $this->render('message', [
                'messages' => $query,
                'id' => $id,
            ]);
        } else if ($id == 1) { // pesan keluar
            $query = $model::find()->where(['dari' => Yii::$app->user->identity->username])->orderBy('tanggal desc')->all();
            return $this->render('message', [
                'messages' => $query,
                'id' => $id,
            ]);
        } else { // pesan masuk
            $query = $model::find()->where(['ke' => Yii::$app->user->identity->username])->orderBy('tanggal desc')->all();
            return $this->render('message', [
                'messages' => $query,
                'id' => $id,
            ]);
        }
    }

    public function actionMypost()
    {
        $model = new Post();
        $query = $model::find()->where(['username' => Yii::$app->user->identity->username])->orderBy('tanggal desc')->all();
        return $this->render('mypost', [
            'posts' => $query,
        ]);
    }

    public function actionDetailpost()
    {
        $modelPost = new Post();
        $id = Yii::$app->request->get('id');
        $queryPost = $modelPost::find()->where(['id' => $id])->one();

        $modelComment = new Comments();
        $queryComment = $modelComment::find()->where(['post_id' => $id])->orderBy('tanggal asc')->all();

        return $this->render('detailpost', [
            'post' => $queryPost,
            'comments' => $queryComment,
        ]);
    }

    public function actionSearch()
    {
        
        $model = new Post();
        $searchparam = Yii::$app->request->get('query');
        $query = $model::find()->where(['like', 'judul', $searchparam])->orderBy('tanggal desc')->all();
        return $this->render('search', [
            'posts' => $query,
            'id' => $searchparam,
        ]);
    }

    public function actionSavecomment()
    {      
        $model = new Comments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/detailpost', 'id' => $model->post_id]);
        } else {
            return $this->redirect('index.php');
        }
    }

    public function actionTrack()
    {      
        return $this->render('track');
    }
    
}
