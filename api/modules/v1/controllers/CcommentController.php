<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Comment Controller API
 * 文章的评论信息
 * 注: 多音节的controller名称只能首字母大写,其他均为小写.
 *
 */
class CommentController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Comment';
    public function serializeData($data){
        //$this->modelClass->validate();
        $ret = parent::serializeData($data);
        return array(
            'commentList'=>$ret);
    }
}


