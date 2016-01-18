<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Articleinfo Controller API
 * 文章详细信息
 * 注: 多音节的controller名称只能首字母大写,其他均为小写.
 *
 */
class ArticleinfoController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\ArticleInfo';
}


