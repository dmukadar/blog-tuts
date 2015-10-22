<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%image}}".
 *
 * @property integer $id
 * @property string $caption
 * @property string $path
 * @property string $url
 * @property integer $post_id
 *
 * @property Post $post
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caption', 'path'], 'required'],
            [['post_id'], 'integer'],
            [['caption', 'path', 'url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'caption' => 'Caption',
            'path' => 'Path',
            'url' => 'Url',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
    
	public function beforeSave($insert){
    	parent::beforeSave($insert);
    	
    	if(!isset($this->post_id)){
    		$post = Post::find()->where(['title'=>'asdsad'])->one();
    		$this->post_id = $post->id;    		
    	}
    	
    	return true;
    }
    
    public function createRecordImage($caption,$path,$id){
    	
    	$imageRecord = new Image();
    	 
    	$imageRecord->caption = $caption;
    	$imageRecord->path = $path;
    	$imageRecord->post_id = $id;
    	 
    	$imageRecord->save();
    }
    
    public function createFolder($pathType, $path) {
    	if(! is_writable($pathType)){
    		mkdir($pathType, 0777, true);
    	}
    }

}
