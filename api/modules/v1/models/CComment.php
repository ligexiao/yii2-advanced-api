<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * CComment Model
 * 对评论的评论
 *
 */
class CComment extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ne_answer_comments';
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
            [['answer_id', 'uid', 'message'], 'required']
        ];
    }
}
