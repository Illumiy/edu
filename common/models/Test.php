<?php

namespace app\common\models;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $title Название задания
 * @property string $description Краткое описание задания
 * @property string $type Тип задания
 * @property string $file_link
 * @property string $begin_at
 * @property string $end_at
 * @property string $deadline_at
 * @property int $count_attempt Количество попвток на выполнение 
 * @property int $is_exam Аттестующий тест
 * @property int $is_draft Черновик
 * @property int $time_limit
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Comments[] $comments
 * @property LectureHasTest[] $lectureHasTests
 * @property User $createdBy
 * @property User $updatedBy
 * @property TestHasAnswerFileUpload[] $testHasAnswerFileUploads
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type', 'file_link','begin_at', 'end_at', 'deadline_at'], 'required'],
            [['description'], 'string'],
            [['begin_at', 'end_at', 'deadline_at', 'created_at', 'updated_at'], 'safe'],
            [['count_attempt', 'is_exam', 'is_draft', 'time_limit', 'created_by', 'updated_by'], 'integer'],
            [['title', 'type', 'file_link'], 'string', 'max' => 255],
            [['count_attempt', 'is_exam', 'is_draft'], 'string', 'max' => 2],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false ,
                'value' => date("Y-m-d H:i:s"),
            ],
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
            'description' => 'Краткое описание',
            'type' => 'Тип',
            'file_link' => 'File Link',
            'begin_at' => 'Begin At',
            'end_at' => 'End At',
            'deadline_at' => 'Deadline At',
            'count_attempt' => 'Кол-во попыток на выполнение',
            'is_exam' => 'Аттестация',
            'is_draft' => 'Черновик',
            'time_limit' => 'Лимит времени(В минутах)',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['test_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectureHasTests()
    {
        return $this->hasMany(LectureHasTest::className(), ['test_id' => 'id']);
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestHasAnswerFileUploads()
    {
        return $this->hasMany(TestHasAnswerFileUpload::className(), ['test_id' => 'id']);
    }
}
