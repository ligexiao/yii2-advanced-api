<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * Country Model
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class Country extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'country';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['code'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required']
        ];
    }

    public $exfield = 'add a new field';

    // explicitly list every field, best used when you want to make sure the changes
    // in your DB table or model attributes do not cause your field changes (to keep API backward compatibility).
    public function fields1()// fields1->fields for test
    {
        return [
            // field name is the same as the attribute name
            'code',
            // field name is "name", the corresponding attribute name is "name"
            'name' => 'name',
            // field name is "myname", its value is defined by a PHP callback
            'myname' => function () {
                return  'yabo';
            },
        ];
    }

    // filter out some fields, best used when you want to inherit the parent implementation
    // and blacklist some sensitive fields.
    public function fields2() // fields2->fields for test
    {
        $fields = parent::fields();

        // remove fields that contain sensitive information
        unset($fields['country'], $fields['code']);

        return $fields;
    }

    public function fields() // fields3->fields for test
    {
        return [
            'code',
            'country',
            'population',
            'code_country' => function ($model) {
                return $model->code.'_'.$model->country; // Return related model property, correct according to your structure
            },
            'people_name' => function ($model) {
                $pp = $model->people;
                //var_dump($pp);//exit;
                if(isset($pp[0])){
                    $name = $pp[0]['name'];
                }else{
                    $name ="_";
                }
                return $name;
            },
            'people_age' => function ($model) {
                $pp = $model->people;
                //var_dump($pp);exit;
                if(isset($pp[0])){
                    $str = $pp[0]['age'];
                }else{
                    $str ="_";
                }
                return $str;
            },
        ];
    }

    public function extraFields()
    {
        return ['exfield']; // exfield为该model的一个属性
    }

    public function getPeople()
    {
        //return $this->hasOne(Country::className(), ['population_id' => 'population_id']);
        //var_dump($this->hasMany(Person::className(), ['country_code' => 'code']));exit;
        return $this->hasMany(Person::className(), ['country_code' => 'code'])
            ->where('country_code = :threshold', [':threshold' => 'AU'])
            ->orderBy('country_code')
            ->asArray();
    }
}
