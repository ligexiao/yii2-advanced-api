<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
use Yii;
/**
 * Post Model
 *
 */
class Post extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return Yii::$app->params['notend_table_prefix'].'nav_menu';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['type_id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['title', 'type', 'type_id'], 'required']
        ];
    }

    public function getName()
    {
        return ['title'];
    }

    public function fields() // fields3->fields for test
    {
        return [
            'id',
            'title',
            'categoryId'=>'type_id',
            'description',
            'link',
            'icon',
           // 'type',
        /*    'article_id' => function ($model) {
                $pp = $model->articles;
                //var_dump($pp);exit;
                $arr  = array();
                foreach($pp as $item){
                    $arr[] = $item['post_id'];
                }
                return $arr;
            },*/
        ];
    }

    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['category_id' => 'type_id'])
            ->orderBy('category_id')
            ->asArray();
    }

}
