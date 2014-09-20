<?php

namespace sheillendra\usermongo\components;

class User extends \yii\web\User {

    public $identityClass = '\sheillendra\usermongo\models\User';
    public $enableAutoLogin = true;
    public $loginUrl = ['/user/auth/login'];

    /*
      protected function afterLogin($identity, $cookieBased)
      {
      parent::afterLogin($identity, $cookieBased);
      if (\Yii::$app->getModule('user')->trackable) {
      $this->identity->setAttribute('login_ip', ip2long(\Yii::$app->getRequest()->getUserIP()));
      $this->identity->setAttribute('login_time', time());
      $this->identity->save(false);
      }
      }
     */
}
