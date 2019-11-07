<?php

namespace app\Common;


/**
 * Teacher module definition class
 */
class Common extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = 'teacher_layout';
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\common\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
