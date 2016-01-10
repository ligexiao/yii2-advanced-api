<?php

namespace api\modules\v1\controllers;


use api\modules\v1\models\Country;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\web\Response;

use yii\data\ActiveDataProvider;
use Yii;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class CountryController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Country';

    public function behaviors1()// behaviors1->behaviors for test
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'contentNegotiator' => [
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ]);
    }

/*
    //  filter results
    public function actionIndex()
    {
        $query = Country::find()->with('country', 'person')->all();
        //$query = Country::find();
        print_r($query);exit;
        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }

    //  filter results
   public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function($action)
        {
            $query = Country::find()->with('countries', 'people')->all();
            return new ActiveDataProvider([
                'query' => $query,
            ]);
        };

        return $actions;
    }*/
}


