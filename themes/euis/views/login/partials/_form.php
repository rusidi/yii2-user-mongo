<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
            'id' => 'login-form',
            'action' => ['/user/login'],
            'method' => 'post']);
echo $form->field($model, 'username')->textInput(['placeholder'=>'Isi username di sini']);
echo $form->field($model, 'password')->passwordInput(['placeholder'=>'Isi password di sini']);

?>
<div class="form-group pull-left">
    <?php echo Html::activeCheckbox($model, 'rememberMe',['class'=>'euis euis-checkbox-2']); ?>
    <?php echo Html::label(' '.Html::encode($model->getAttributeLabel('rememberMe')),'loginform-rememberme',['class'=>'lbl']); ?>
</div>
<div class="form-group pull-right">
    <?php echo Html::submitButton('Login', ['class' => 'btn btn-warning btn-sm', 'name' => 'login-button']) ?>
</div>
<?php
ActiveForm::end();

