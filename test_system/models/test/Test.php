<?php

namespace app\test_system\models\test;

use app\models\CourseHasLecture;
use app\models\Profile;
use app\test_system\models\lecture_has_test\LectureHasTest;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $title Название задания
 * @property string $description Краткое описание задания
 * @property string $type Тип задания
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
 * @property LectureHasTest[] $lectureHasTests
 * @property TestHasAnswerFileUpload[] $testHasAnswerFileUploads
 */
class Test extends \yii\db\ActiveRecord {
	public $lecture_id;
	public $time_limit_minutes;
	public $time_limit_hours;

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'test';
	}

	/**
	 * @return array
	 */
	public function behaviors() {
		return [
			[
				'class'              => BlameableBehavior::className(),
				'createdByAttribute' => 'created_by',
				'updatedByAttribute' => 'updated_by',
			],
			[
				'class'              => TimestampBehavior::className(),
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => 'updated_at',
				'value'              => new Expression( 'NOW()' ),
			]
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[ [ 'title', 'type'], 'required' ],
			[ [ 'description' ], 'string' ],
			[
				[
					'begin_at',
					'end_at',
					'deadline_at',
					'created_at',
					'updated_at',
					'time_limit_minutes',
					'time_limit_hours'
				],
				'safe'
			],
			[
				[ 'count_attempt', 'is_exam', 'is_draft', 'time_limit', 'created_by', 'updated_by', 'lecture_id' ],
				'integer'
			],
			[ [ 'title', 'type' ], 'string', 'max' => 255 ],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'                 => 'Выберет тест',
			'title'              => Yii::t( 'test_system', 'Title' ),
			'description'        => Yii::t( 'test_system', 'Description' ),
			'type'               => Yii::t( 'test_system', 'Type' ),
			'begin_at'           => Yii::t( 'test_system', 'Begin At' ),
			'end_at'             => Yii::t( 'test_system', 'End At' ),
			'deadline_at'        => Yii::t( 'test_system', 'Deadline At' ),
			'count_attempt'      => Yii::t( 'test_system', 'Count Attempt' ),
			'is_exam'            => Yii::t( 'test_system', 'Is Exam' ),
			'is_draft'           => Yii::t( 'test_system', 'Is Draft' ),
			'time_limit'         => Yii::t( 'test_system', 'Time Limit' ),
			'created_at'         => Yii::t( 'test_system', 'Created At' ),
			'updated_at'         => Yii::t( 'test_system', 'Updated At' ),
			'created_by'         => Yii::t( 'test_system', 'Created By' ),
			'updated_by'         => Yii::t( 'test_system', 'Updated By' ),
			'lecture'            => Yii::t( 'test_system', 'Lecture' ),
			'time_limit_minutes' => Yii::t( 'test_system', 'Time limit minutes' ),
			'time_limit_hours'   => Yii::t( 'test_system', 'Time limit hours' ),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getLectureHasTests() {
		return $this->hasMany( LectureHasTest::className(), [ 'test_id' => 'id' ] );
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTestHasAnswerFileUploads() {
		return $this->hasMany( TestHasAnswerFileUpload::className(), [ 'test_id' => 'id' ] );
	}

	/**
	 * {@inheritdoc}
	 * @return TestAQ the active query used by this AR class.
	 */
	public static function find() {
		return new TestAQ( get_called_class() );
	}

	/**
	 * @param bool $insert
	 *
	 * @return bool|void
	 */
	public function beforeSave( $insert ) {
		parent::beforeSave( $insert );
		$this->time_limit = ( $this->time_limit_hours * 60 ) + ( $this->time_limit_minutes );

		return parent::beforeSave( $insert );
	}

	/**
	 * @param bool $insert
	 * @param array $changedAttributes
	 */
	public
	function afterSave(
		$insert, $changedAttributes
	) {
		parent::afterSave( $insert, $changedAttributes );
		LectureHasTest::addRecord( $this->lecture_id, $this->id );
	}

	/**
	 * @param $count
	 *
	 * @return array
	 */
	public static function listTime( $count ) {
		$i = 0;
		$count ++;
		while ( $i < $count ) {
			$arr[] = $i;
			$i ++;
		}

		return $arr;
	}

	/**
	 * @param $type
	 *
	 * @return string
	 */
	public static function iconType($type){
		switch ($type){
			case 'file' :
				return '<i class="fa fa-cloud-upload fa"></i> ';
		}
	}


}
