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
    
    // Get car models by car id for dropdown list
    public function actionGetCarModelsByCarId()
    {
        $data = CarModels::model()->findAllByAttributes(array('car_id' => (int)$_REQUEST['id']));
        echo '<option>Выберите марку автомобиля</option>';
        foreach($data as $item)
        {
            echo '<option value=' . $item->id . '>' . $item->title . '</option>'; 
        }
    }
    
    // Get job by job type id for dropdown list
    public function actionGetJobByJobTypeId()
    {
        $data = Jobs::model()->findAllByAttributes(array('job_type_id' => (int)$_REQUEST['id']));
        echo '<option>Выберите подвид работ</option>';
        foreach($data as $item)
        {
            echo '<option value=' . $item->id . '>' . $item->title . '</option>'; 
        }
    }
}
?>
