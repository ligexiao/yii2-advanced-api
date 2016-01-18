<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Article Controller API
 * 文章信息
 *
 */
class ArticleController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Article';

    public function serializeData($data){
        //$this->modelClass->validate();
        $ret = parent::serializeData($data);
        return array(
                'articleList'=>$ret);
    }

}


