<?php

namespace app\common\models;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use Yii;

/**
 * This is the model class for table "answer_file_upload".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property int $attempt
 * @property string $file_link
 * @property string $file_type
 * @property int $time_left
 * @property int $created_by
 *
 * @property User $createdBy
 * @property TestHasAnswerFileUpload[] $testHasAnswerFileUploads
 */
class AnswerFileUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer_file_upload';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => date("Y-m-d H:i:s"),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'file_link', 'created_by'], 'required'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['attempt', 'time_left', 'created_by'], 'integer'],
            [['title', 'file_link', 'file_type'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }
  

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'created_at' => 'Created At',
            'attempt' => 'Attempt',
            'file_link' => 'File Link',
            'file_type' => 'File Type',
            'time_left' => 'Time Left',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestHasAnswerFileUploads()
    {
        return $this->hasMany(TestHasAnswerFileUpload::className(), ['answer_file_upload_id' => 'id']);
    }
}
