<?php

namespace sheillendra\usermongo\controllers;

use Yii;
use yii\web\Controller;
use sheillendra\usermongo\models\LoginForm;
use yii\filters\AccessControl;

class LoginController extends Controller {

    public $defaultAction = 'login';

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load($_POST) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

}
