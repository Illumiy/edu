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
        [['docFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, docx'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->docFile->saveAs('../web/uploads/labs/' . date("mdYHis") . '.' . $this->docFile->extension);
            $this->docLink='../web/uploads/labs/' . date("mdYHis") . '.' . $this->docFile->extension;
            //$this->docFile->saveAs('../web/uploads/' . $this->docFile->baseName . '.' . $this->docFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
?>