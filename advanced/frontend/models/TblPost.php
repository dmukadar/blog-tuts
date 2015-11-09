<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_post".
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
 * @property TblComment[] $tblComments
 * @property TblImage[] $tblImages
 * @property TblUsers $author
 */
class TblPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'tags', 'status', 'create_time', 'update_time', 'slug', 'author_id', 'image'], 'required'],
            [['content'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['author_id'], 'integer'],
            [['title', 'tags', 'status', 'slug', 'image'], 'string', 'max' => 255]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblComments()
    {
        return $this->hasMany(TblComment::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblImages()
    {
        return $this->hasMany(TblImage::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(TblUsers::className(), ['id' => 'author_id']);
    }

}
