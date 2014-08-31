<?php

namespace sheillendra\usermongo;

use Yii;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'sheillendra\usermongo\controllers';
    public $defaultRoute = 'signup';
    public function init() {
        parent::init();
        Yii::$app->getI18n()->translations['user*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@sheillendra/usermongo/messages',
        ];

        if (isset(Yii::$app->view->theme->active)) {
            unset(Yii::$app->viewPath); //jika home bukan di frontend folder, tapi dari sebuah module
            Yii::$app->view->theme->pathMap['@sheillendra/usermongo/views'] = [
                '@sheillendra/usermongo/themes/'
                . Yii::$app->view->theme->active . '/views'
            ];
        }
    }

}
