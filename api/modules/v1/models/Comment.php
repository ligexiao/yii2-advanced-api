<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
use Yii;
/**
 * Comment Model
 *
 */
class Comment extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return Yii::$app->params['notend_table_prefix'].'answer';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['answer_id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['answer_id', 'question_id', 'answer_content'], 'required']
        ];
    }

    public function fields()
    {
        return [
            'id'=>'answer_id',
            'articleId'=>'question_id',
            'categoryId'=>'category_id',
            'contents'=>function ($model) {
                $cnt = $model->answer_content;
                $cnt_arr = explode("\n",$cnt);
                return $cnt_arr;
            },
            'againstCount'=>'against_count',
            'agreeCount'=>'agree_count',
            'uninterestedCount'=>'uninterested_count',
            'thanksCount'=>'thanks_count',
            'anonymous'=>'anonymous',
            'addTime'=>'add_time',
            'ccomments' => function ($model) {
                $pp = $model->ccomment;
                //var_dump($pp);exit;
                $cclist = array();
                foreach($pp as $item){
                    $tmp = array(
                        'time'=> $item['time'],
                        'message'=> $item['message'],
                    );
                    $users =  $this->getUserById($item['uid']);
                    $tmp['uid'] = $users['uid'];
                    $tmp['userName'] = $users['user_name'];
                    $tmp['avatar']= $users['avatar_file'];
                    $cclist[] = $tmp;
                }


                $ret = array(
                    'ccommentCount'=>$model->comment_count,
                    'ccommentList'=>$cclist,
                );

                return $ret;
            },
        ];
    }

    // Get comments of the current comment
    public function getCcomment()
    {
        return $this->hasMany(Ccomment::className(), ['answer_id' => 'answer_id'])
            ->asArray();
    }

    // Get Basic User info
    public function getUserById($id)
    {
        return  User::findOne($id)->toArray();
    }
}
