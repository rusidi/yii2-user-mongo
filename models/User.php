<?php

namespace sheillendra\usermongo\models;

use yii\mongodb\ActiveRecord;

class Customer extends ActiveRecord {

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName() {
        return 'user';
    }

    /**
     * @return array list of attribute names.
     */
    public function attributes() {
        return ['_id', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'role', 'status', 'created_at', 'updated_at'];
    }

}
