<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
use Yii;
/**
 * User Model
 *
 */
class User extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return Yii::$app->params['notend_table_prefix'].'users';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['uid'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['uid', 'user_name', 'password', 'email', 'group_id'], 'required']
        ];
    }

    public function getName()
    {
        return ['user_name'];
    }

    public function fields() // fields3->fields for test
    {
        return [
            'uid',
            'user_name',
            'email',
            'group_id',
            'user_defined'=>function () {
                return  '自定义';
            },
            'avatar_file'
        ];
    }

}
