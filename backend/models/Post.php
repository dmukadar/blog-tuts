<?php

namespace app\models;

use Yii;
use yiiwebUploadedFile;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property string $status
 * @property string $create_time
 * @property string $update_time
 * @property string $slug
 * @property integer $author_id
 * @property string $image
 *
 * @property Comment[] $comments
 * @property Image[] $images
 * @property Users $author
 */
class Post extends \yii\db\ActiveRecord
{
	public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'tags', 'status'], 'required'],
            [['content'], 'string'],
            [['create_time', 'update_time','file'], 'safe'],
            [['author_id'], 'integer'],
        	[['create_time', 'update_time'], 'default', 'value' => date("Y-m-d h:i:s")],
        	[['file'],'file','extensions'=>'jpg, gif, png'],
            [['title', 'status', 'slug'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'tags' => 'Tags',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'slug' => 'Slug',
            'author_id' => 'Author ID',
            'image' => 'Image',
        	'file' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Users::className(), ['id' => 'author_id']);
    }
    public function beforeSave($insert){
    	parent::beforeSave($insert);
    	$users = Users::find()->where(['username'=>'karsa'])->one();
    	$this->author_id = $users->id;
    	$this->tags = self::findTags($this->tags);

    	return true;
    }
    
    public function findTags($tags) {
    		$tag = Tag::findOne($tags); 
    		
    		if(!isset($tag)){
    			$tag = new Tag();
    			$tag->name = $tags;
    			$tag->frequency = 1;
    			$tag->save();
    		}else{
    			$tag->frequency = $tag->frequency + 1;
    			$tag->update();
    		}
    		$tagName = $tag->id;
    		
    		return $tagName;
    }
    
    public function minusFrequencyTag($id){
    	$post = self::findOne($id);
    	$tag = Tag::findOne($post->tags);
    	if($tag->frequency <= 1){
    		$tag->delete();
    	}else{
    		$tag->frequency = $tag->frequency - 1;
    		$tag->update();
    	}
    	    	
    }
}
