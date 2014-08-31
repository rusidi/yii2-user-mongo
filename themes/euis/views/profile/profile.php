<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$form = ActiveForm::begin([
            'action' => ['upload-photo'],
            'options' => ['enctype' => 'multipart/form-data']]);


echo $form->field($model, 'description')
        ->textInput([
            'class' => 'form-control inline-input',
            'placeholder' => Yii::t('app', 'Description')
        ])
        ->label('');

echo $form->field($model, 'file')->fileInput()->label('');

echo Html::submitButton($model->isNewRecord ? 'Upload' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);

ActiveForm::end();

echo Html::img(
        Url::toRoute(['get-photo-profile', 'user_id' => Yii::$app->user->id], true), ['id' => 'avatar2', 'alt' => $model->description]
);
