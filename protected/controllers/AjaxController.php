<?php

class AjaxController extends Controller
{
    public function init()
    {
        if(!Yii::app()->request->isAjaxRequest)
        {
            throw new CHttpException(404, 'Not found');
        }
    }    
   
}
?>
