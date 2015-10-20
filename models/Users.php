<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_users}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $profile
 * @property string $create_time
 * @property string $update_time
 *
 * @property TblPost[] $tblPosts
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'profile'], 'required'],
            [['profile'], 'string'],
        	[['email'], 'email'],
        	[['create_time', 'update_time'], 'default', 'value' => date("Y-m-d h:i:s")],
            [['create_time', 'update_time'], 'safe'],
            [['username', 'password', 'salt', 'email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'salt' => 'Salt',
            'email' => 'Email',
            'profile' => 'Profile',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPosts()
    {
        return $this->hasMany(TblPost::className(), ['author_id' => 'id']);
    }
}
