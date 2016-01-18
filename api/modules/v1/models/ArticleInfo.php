<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * ArticleInfo Model
 *
 */
class ArticleInfo extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ne_question';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['question_id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['question_id', 'question_content', 'question_detail'], 'required']
        ];
    }

    public function fields()
    {
        return [
            'id'=>'question_id',
            'title' => 'question_content',
            'contents'=>function ($model) {
                $cnt = $model->question_detail;
                $cnt_arr = explode("\n",$cnt);
                return $cnt_arr;
            },
            'categoryId'=>'category_id',
            'viewCount'=>'view_count',
            'answerCount'=>'answer_count',
            'agreeCount'=>'agree_count',
            'popularValue'=>'popular_value',
            'isRecommend'=>'is_recommend',
            'anonymous'=>'anonymous',
            'addTime'=>'add_time',
            'updateTime'=>'update_time',
            'publisher' => function ($model) {
                $pp = $model->article;
                //var_dump($pp);exit;
                if(isset($pp[0])){
                    $var = $pp[0]['uid'];
                }else{
                    $var =-1;
                }
                $users =  $this->getUserById($var);
                $ret = array(
                    'uid' => $users['uid'],
                    'userName'=> $users['user_name'],
                    'avatar'=> $users['avatar_file'],
                );

                return $ret;
            },
        ];
    }

    // Get Basic Article info
    public function getArticle()
    {
        return $this->hasMany(Article::className(), ['post_id' => 'question_id'])
            ->asArray();
    }

    // Get Basic User info
    public function getUserById($id)
    {
        return  User::findOne($id)->toArray();
    }
}
