<?php

namespace sheillendra\usermongo\models;

use Yii;
use yii\mongodb\file\ActiveRecord;
use yii\mongodb\file\Query;

/**
 * Class Asset
 * @package common\models
 * @property string $_id MongoId
 * @property array $filename
 * @property string $uploadDate
 * @property string $length
 * @property string $chunkSize
 * @property string $md5
 * @property array $file
 * @property string $newFileContent
 * @property string $contentType
 * @property string $description
 */
class PhotoProfile extends ActiveRecord {

    public static function getDb()
    {
        return Yii::$app->get('db');
    }
    
    public static function collectionName() {
        return 'photo_profile';
    }

    public function rules() {
        return[
            [['userId','description', 'contentType'], 'required'],
        ];
    }

    public function attributes() {
        return array_merge(
                parent::attributes(), ['userId','contentType', 'description']
        );
    }

    public function get($user_id) {
        $query = new Query;
        $row = $query
                ->from('photo_profile')
                ->where([
                    'userId' => $user_id
                ])
                ->one($this->db);
        return ['contentType' => $row['contentType'], 'byte' => $row['file']->getBytes()];
    }

}
