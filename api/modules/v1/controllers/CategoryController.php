<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Category Controller API
 * 文章分类信息
 *
 */
class CategoryController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Category'; //model to be used as a resource

    public function serializeData($data){
        //$this->modelClass->validate();
        $ret = parent::serializeData($data);
        return array(
                'categoryList'=>$ret);
    }
}


