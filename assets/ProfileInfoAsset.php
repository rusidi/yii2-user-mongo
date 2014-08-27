<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace sheillendra\usermongo\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ProfileInfoAsset extends AssetBundle
{
	public $sourcePath = '@sheillendra/usermongo/views/assets';
	public $css = [];
	public $js = [
		'js/user-profile-info.js',
		//'js/game-general.js',
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
	public $publishOptions=['forceCopy'=>YII_DEBUG];
}
