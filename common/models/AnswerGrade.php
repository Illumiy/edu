<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "answer_grade".
 *
 * @property int $id
 * @property string $type Тип оценок
 * @property string $grade_json Оценка в формате JSON
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property TestHasAnswerFileUpload $testHasAnswerFileUpload
 */
class AnswerGrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer_grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'grade_json'], 'required'],
            [['grade_json', 'comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'grade_json' => 'Grade Json',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestHasAnswerFileUpload()
    {
        return $this->hasOne(TestHasAnswerFileUpload::className(), ['grade_id' => 'id']);
    }
}
