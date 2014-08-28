<?php

namespace sheillendra\usermongo\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use sheillendra\usermongo\models\PhotoProfile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ProfileController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'upload-photo', 'get-photo-profile'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'upload-photo' => ['post'],
                    'get-photo-profile' => ['get']
                ],
            ],
        ];
    }

    public function actionIndex() {
        $model = new PhotoProfile;
        return $this->render('profile', ['model' => $model]);
    }

    public function actionUploadPhoto() {
        $model = new PhotoProfile;
        if ($model->load($_POST)) {
            $file = UploadedFile::getInstance($model, 'file');
            $model->userId =Yii::$app->user->id;
            $model->filename = $file->name;
            $model->contentType = $file->type;
            $model->file = $file;
            $model->save();
        }
        return $this->redirect(['index']);
    }

    public function actionGetPhotoProfile($user_id) {
        $model = new PhotoProfile;
        $row = $model->get($user_id);
        header('Content-type: ' . $row['contentType']);
        echo $row['byte'];
    }

}
