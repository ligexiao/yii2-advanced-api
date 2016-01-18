<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
use Yii;
/**
 * Article Model
 *
 */
class Article extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return Yii::$app->params['notend_table_prefix'].'posts_index';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['post_id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['post_id', 'post_type', 'category_id'], 'required']
        ];
    }

    public function fields()
    {
        return [
            'id',
            'articleId'=>'post_id',
            'categoryId'=>'category_id',
            'articleTitle' => function ($model) {
                $pp = $model->articleInfo;
                //var_dump($pp);exit;
                if(isset($pp[0])){
                    $title = $pp[0]['question_content'];
                }else{
                    $title ="_";
                }
                return $title;
            },
            /*'article_content' => function ($model) {
                $pp = $model->articleInfo;
                //var_dump($pp);exit;
                $arr  = array();
                foreach($pp as $item){
                    $arr[] = $item['question_detail'];
                }
                return $arr;
            },*/
            //'uid',
            'viewCount'=>'view_count',
            'answerCount'=>'answer_count',
            'agreeCount'=>'agree_count',
            'popularValue'=>'popular_value',
            'isRecommend'=>'is_recommend',
            'anonymous'=>'anonymous',
            'addTime'=>'add_time',
            'updateTime'=>'update_time',
        ];
    }

    public function getArticleInfo()
    {
        return $this->hasMany(ArticleInfo::className(), ['question_id' => 'post_id'])
            ->orderBy('question_id')
            ->asArray();
    }
}
