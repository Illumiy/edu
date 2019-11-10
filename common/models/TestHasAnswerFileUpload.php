<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "test_has_answer_file_upload".
 *
 * @property int $id
 * @property int $test_id
 * @property int $answer_file_upload_id
 * @property int $grade_id
 *
 * @property AnswerFileUpload $answerFileUpload
 * @property AnswerGrade $grade
 * @property Test $test
 */
class TestHasAnswerFileUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_has_answer_file_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_id', 'answer_file_upload_id', 'grade_id'], 'integer'],
            [['grade_id'], 'unique'],
            [['answer_file_upload_id'], 'exist', 'skipOnError' => true, 'targetClass' => AnswerFileUpload::className(), 'targetAttribute' => ['answer_file_upload_id' => 'id']],
            [['grade_id'], 'exist', 'skipOnError' => true, 'targetClass' => AnswerGrade::className(), 'targetAttribute' => ['grade_id' => 'id']],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'answer_file_upload_id' => 'Answer File Upload ID',
            'grade_id' => 'Grade ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerFileUpload()
    {
        return $this->hasOne(AnswerFileUpload::className(), ['id' => 'answer_file_upload_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(AnswerGrade::className(), ['id' => 'grade_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }
}
