<?php

namespace app\models;

use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $profile
 * @property string $create_time
 * @property string $update_time
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Post[] $posts
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface

{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'profile'], 'required'],
            [['profile'], 'string'],
            [['create_time', 'update_time'], 'safe'],
        	[['email'], 'email'],
        	[['create_time', 'update_time'], 'default', 'value' => date("Y-m-d h:i:s")],
            [['username', 'password', 'salt', 'email'], 'string', 'max' => 255],
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
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['author_id' => 'id']);
    }    
    
    public static function findByUsername($username)
    {
    	return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
    	return $this->password === $password;
    }
    
    public static function findIdentity($id){
    	$user = self::find()->where(['id'=> $id])->one();
    	
    	return $user;
    }
    
    public static function findIdentityByAccessToken($token, $type = null){

    }
    
    public function getId(){
    	return $this->id;
    }
    
    public function getAuthKey(){
    	return $this->authKey;
    }
    
    public function validateAuthKey($authKey){
    	return $this->authKey === $authKey;
    }
    
    public function beforeSave($insert){
    	if (parent::beforeSave($insert)){
    		if($this->isNewRecord){
    			$this->authKey = \Yii::$app->security->generateRandomString();
    			$this->accessToken = \Yii::$app->security->generateRandomString();
    		}
    		return true;
    	}
    	return false;
    }
}
