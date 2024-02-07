<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Person model
 */
class Person extends ActiveRecord
{

    public function rules()
    {
        return [
            [['name', 'email', 'country', 'tags'], 'required'], // must have minimum one row for every field
            [['name', 'email', 'country', 'tags' ,'age'], 'trim'],
            ['age', 'required', 'message' => 'Please place your age here (custom error message)'],
            ['email', 'email', 'message' => 'Please insert correct email.'],
            ['age', 'integer', 'integerOnly'=> true, 'min' => 16, 'max' => 200, 'message' => 'must be integer'],
            ['name', 'string', 'min' => 4, 'max' => 15, 'tooShort' => 'too short', 'tooLong' => 'too long'],
        ];
    }
}