<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_comment".
 *
 * @property integer $id
 * @property string $content
 * @property string $status
 * @property string $create_time
 * @property string $author
 * @property string $email
 * @property string $url
 * @property integer $post_id
 *
 * @property TblPost $post
 */
class TblComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'content', 'status', 'create_time', 'author', 'email', 'url', 'post_id'], 'required'],
            [['id', 'post_id'], 'integer'],
            [['content'], 'string'],
            [['create_time'], 'safe'],
            [['status', 'author', 'email', 'url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'author' => 'Author',
            'email' => 'Email',
            'url' => 'Url',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(TblPost::className(), ['id' => 'post_id']);
    }
}
