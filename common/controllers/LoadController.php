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
use app\test_system\models\test\Test;
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
        $model = new Test;
        $id='sdds';
        $data = $model->find()->all();
        if(Yii::$app->request->post()){
            $session = Yii::$app->session;
            $session->open();
            $_SESSION['test']=$_POST['test'];
            return $this->redirect(['upload']);
        }
        return $this->render('index', [
            'model' => $model,
            'data' => ArrayHelper::map($data,'id','title'),
        ]);
    }
    public function actionUpload()
    {
        $model = new UploadForm;
        $test= new Test;
        if (Yii::$app->request->isPost) {
            $model->docFile = UploadedFile::getInstance($model, 'docFile');
            if ($model->upload()) {
//                print_r($model->docLink);
                $saveTest= new Test;
                $saveTest->type=$_POST['Test']['type'];
                $saveTest->title=$_POST['Test']['title'];
                $saveTest->file_link=$model->docLink;
                $saveTest->save();
            }else{
            }
        }

        return $this->render('upload', [
            'model' => $model,
            'test'=>$test,
//            'data' => ArrayHelper::map($data,'id','title'),
        ]);
    }
}