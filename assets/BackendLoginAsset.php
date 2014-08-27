<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace sheillendra\usermongo\assets;

use yii\web\AssetBundle;

class BackendLoginAsset extends AssetBundle
{
	public $sourcePath = '@sheillendra/usermongo';
	public $css = ['views/assets/css/signin.css'];
	public $js = [];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}
