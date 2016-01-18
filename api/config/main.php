<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),    
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['v1/country','v1/person','v1/heyy','v1/user','v1/post','v1/article','v1/articleinfo','v1/comment','v1/ccomment'],
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                    
                ]
            ],        
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                // @todo suppress_response_code参数:用于支持返回数据中包含响应code的情形.
                //if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                if ($response->data !== null ) {
                    $response->data = [
                        'code' => $response->isSuccessful ? 0 : -1,
                        'message' => $response->isSuccessful ? 'ok' : 'error',
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            },
        ],
    ],
    'params' => $params,
];



