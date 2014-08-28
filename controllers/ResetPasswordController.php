<?php

namespace sheillendra\usermongo\controllers;

use Yii;
use sheillendra\usermongo\models\ResetPasswordForm;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\base\InvalidParamException;

class ResetPasswordController extends Controller {

    public $defaultAction = 'reset-password';

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['reset-password'],
                'rules' => [
                    [
                        'actions' => ['reset-password'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');
            return $this->goHome();
        }
        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

}
