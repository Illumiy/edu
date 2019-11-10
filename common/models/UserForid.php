<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property int $confirmed_at
 * @property string $unconfirmed_email
 * @property int $blocked_at
 * @property string $registration_ip
 * @property int $created_at
 * @property int $updated_at
 * @property int $flags
 * @property int $last_login_at
 *
 * @property AnswerFileUpload[] $answerFileUploads
 * @property Comments[] $comments
 * @property Group[] $groups
 * @property GroupHasUser[] $groupHasUsers
 * @property Profile $profile
 * @property SocialAccount[] $socialAccounts
 * @property Test[] $tests
 * @property Test[] $tests0
 * @property Token[] $tokens
 */
class UserForid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Имя учителя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerFileUploads()
    {
        return $this->hasMany(AnswerFileUpload::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['creator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupHasUsers()
    {
        return $this->hasMany(GroupHasUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialAccounts()
    {
        return $this->hasMany(SocialAccount::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTests0()
    {
        return $this->hasMany(Test::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens()
    {
        return $this->hasMany(Token::className(), ['user_id' => 'id']);
    }
}
