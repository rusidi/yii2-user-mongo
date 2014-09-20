<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-login">
    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php echo $this->render('partials/_form',['model'=>$model]) ?>
            <div style="color:#999;margin:1em 0">
                If you forgot your password you can <?php echo Html::a('reset it', ['/user/request-password-reset']) ?>.
            </div>
        </div>
    </div>
</div>
