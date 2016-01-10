<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Person Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class PersonController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Person';
    /*public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'data',
    ];*/

    public function serializeData($data){
        $ret = parent::serializeData($data);
        return array(
                'code'=>0,
                'msg'=>' status is ok.',
                'data'=>$ret);
    }
}


