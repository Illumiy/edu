<?php
/**
 * Created by PhpStorm.
 * User: ClassUser
 * Date: 30.10.2019
 * Time: 13:24
 */

namespace app\common\controllers;

use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use app\common\models\UploadForm;
use app\common\models\Test;
use app\common\models\Testforid;
use app\common\models\UserForid;
use app\common\models\AnswerFileUpload;
use app\common\models\TestHasAnswerFileUpload;
use yii\helpers\ArrayHelper;
use Yii;
use yii\web\UploadedFile;

class LoadController extends Controller


{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $model = new UserForid;
        $data = $model->find()->where(['flags' => 1])->all();
        if(Yii::$app->request->post()){
            $session = Yii::$app->session;
            $session->open();
            $_SESSION['teacher']=$_POST['UserForid']['id'];
            return $this->redirect(['uploadstudent']);
        }
        return $this->render('index', [
            'model' => $model,
            'data' => ArrayHelper::map($data,'id','username'),
        ]);
    }
    public function actionUploadstudent()
    {   
        if(empty($_SESSION['teacher'])){
            return $this->redirect(['index']);
        }
        $model = new UploadForm;
        $answer= new AnswerFileUpload;
        $modeltest= new Testforid;
        $datatest= $modeltest->find()->where(['created_by'=>$_SESSION['teacher']])->all();
        if(empty($datatest)){
            return $this->render('error');
        }
        if ($answer->load(Yii::$app->request->post())) {
            $model->docFile = UploadedFile::getInstance($model, 'docFile');
            if ($model->uploadstudent()) {
                $answer->file_link=$model->docLink;
                $answer->file_type=$model->docFile->extension;
                $answer->created_by=$_SESSION['__id'];
                $answer->save();
                $saveAnswerMej=new TestHasAnswerFileUpload;
                $saveAnswerMej->test_id=$_POST['Testforid']['id'];
                $saveAnswerMej->answer_file_upload_id=$answer->id;
                $saveAnswerMej->save();
                return $this->redirect(['../site/index']);
            }
        }
        return $this->render('uploadstudent', [
            'model' => $model,
            'modeltest'=> $modeltest,
            'answer' => $answer,
            'datatest' => ArrayHelper::map($datatest, 'id','title'),
//            'data' => ArrayHelper::map($data,'id','title'),
        ]);
    }
    public function actionUploadteacher()
    {   
        $model = new UploadForm;
        $test= new Test;
        if ($test->load(Yii::$app->request->post())) {
            $model->docFile = UploadedFile::getInstance($model, 'docFile');
            if ($model->upload()) {
                $test->file_link=$model->docLink;
                $test->created_by=$_SESSION['__id'];
                $test->save();
                return $this->redirect(['../site/index']);
            }
        }

        return $this->render('uploadteacher', [
            'model' => $model,
            'test'=>$test,
        ]);
    }
}