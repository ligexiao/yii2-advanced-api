<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * Person Model
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class Person extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'person';
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
            [['name', 'age', 'country_code'], 'required']
        ];
    }

    public function getName()
    {
        return ['name'];
    }

    public function fields() // fields3->fields for test
    {
        return [
            'name',
            'age',
            'user_defined'=>function () {
                return  '自定义';
            },
            'country_code',
            'country_country' => function ($model) {
                $pp = $model->countries;
                //var_dump($pp);exit;
                if(is_array($pp)){
                    $name = $pp['country'];
                }else{
                    $name ="_";
                }
                return $name;
            },
            'country_population' => function ($model) {
                $pp = $model->countries;
                //var_dump($pp);//exit;
                if(is_array($pp)){
                    $name = $pp['population'];
                }else{
                    $name ="_";
                }
                return $name;
            },
        ];
    }

    public function getCountries()
    {
        return $this->hasOne(Country::className(), ['code' => 'country_code'])
            ->where('code = :threshold', [':threshold' => 'AU'])
            ->orderBy('code')
            ->asArray();
    }
}
