<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Post Controller API
 * 文章分类信息
 *
 */
class PostController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Post'; //model to be used as a resource

    public function serializeData($data){
        //$this->modelClass->validate();
        $ret = parent::serializeData($data);
        return array(
                'categoryList'=>$ret);
    }
}


