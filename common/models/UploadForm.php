<?php
namespace app\common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
/**
* @var UploadedFile
*/
    public $docFile;
    public $docLink;

    public function rules()
    {
        return [
        [['docFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, docx, doc'],
        ];
    }

    public function upload()//Сохранение теста учителя
    {
        if ($this->validate()) {
            $this->docFile->saveAs('../web/uploads/labs/' . date("mdYHis").'_'.$_SESSION['__id'] . '.' . $this->docFile->extension);
            $this->docLink='../web/uploads/labs/' . date("mdYHis").'_'.$_SESSION['__id'] . '.' . $this->docFile->extension;
            return true;
        } else {
            return false;
        }
    }
    public function uploadstudent()//Сохранение ответа ученика
    {
        if ($this->validate()) {
            $this->docFile->saveAs('../web/uploads/Answers/' . date("mdYHis").'_'.$_SESSION['__id'] . '.' . $this->docFile->extension);
            $this->docLink='../web/uploads/Answers/' . date("mdYHis").'_'.$_SESSION['__id'] . '.' . $this->docFile->extension;
            return true;
        } else {
            return false;
        }
    }
}
?>