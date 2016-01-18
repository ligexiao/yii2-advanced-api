<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
use Yii;
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
		return Yii::$app->params['notend_table_prefix'].'answer_comments';
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
