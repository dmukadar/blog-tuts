<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_tag".
 *
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 */
class TblTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'frequency'], 'required'],
            [['id', 'frequency'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
        ];
    }
}
