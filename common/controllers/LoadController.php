<?php
/**
 * Created by PhpStorm.
 * User: ClassUser
 * Date: 30.10.2019
 * Time: 13:24
 */

namespace app\common\controllers;

use yii\filters\VerbFilter;
use yii\helpers\Url;
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
    public function actionIndex()  // Метод с выборо учителя
    {
        if(empty($_SESSION['__id'])){
            return $this->redirect([Url::to(['/../site/index'])]);
        }
        $model = new UserForid;
        $data = $model->find()->where(['flags' => 1])->all();
        if(Yii::$app->request->post()){ // Принятие данных и сохранение их в сессии
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
    public function actionUploadstudent() //Метод  с загрузкой ответа от ученика
    {   
        if(empty($_SESSION['teacher']) || empty($_SESSION['__id'])){
            return $this->redirect(['index']);
        }
        $model = new UploadForm;
        $answer= new AnswerFileUpload;
        $modeltest= new Testforid;
        $datatest= $modeltest->find()->where(['created_by'=>$_SESSION['teacher']])->all();
        if(empty($datatest)){
            return $this->render('error');
        }
        if ($answer->load(Yii::$app->request->post())) {//Принятие данных и их сохранение 
            $searchTestAnswer= TestHasAnswerFileUpload::find() // проверка на кол-во пыток
            ->where(['test_id'=>$_POST['Testforid']['id']])
            ->max('answer_file_upload_id');
            $searchAnswer= AnswerFileUpload::find()->where(['id'=>$searchTestAnswer])->one();
            $searchTest= Test::find()->where(['id'=>$_POST['Testforid']['id']])->one();
            if($searchTest->count_attempt <= $searchAnswer->attempt){
                return $this->render('attempt');
            }else{
                $attempt=$searchAnswer->attempt + 1;
            }
            $model->docFile = UploadedFile::getInstance($model, 'docFile');
            if ($model->uploadstudent()) {//Сохранение загруженного файла
                $answer->attempt=$attempt;
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
    public function actionUploadteacher()//Метод  с загрузкой теста от учителя
    {
        if(empty($_SESSION['__id'])){
            return $this->redirect([Url::to(['/../site/index'])]);
        }
        $model = new UploadForm;
        $test= new Test;
        if ($test->load(Yii::$app->request->post())) {//Принятие данных и их сохранение
            $model->docFile = UploadedFile::getInstance($model, 'docFile');
            if ($model->upload()) {//Сохранение загруженного файла
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