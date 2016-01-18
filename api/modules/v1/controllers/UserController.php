<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Users Controller API
 *
 */
class UserController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\User';
    /*public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'data',
    ];*/

    public function serializeData($data){
        //$this->modelClass->validate();
        $ret = parent::serializeData($data);
        return array(
                'code'=>0,
                'msg'=>' status is ok.',
                'data'=>$ret);
    }

    public function hello(){
        echo 'Hello Notend';
    }
}


