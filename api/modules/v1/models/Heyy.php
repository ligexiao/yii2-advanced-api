<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * Heyy Model
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class Heyy extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'heyy';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['name'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['name', 'age'], 'required']
        ];
    }
}
