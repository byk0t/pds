<?php

class UserController extends Controller
{
        
        public function filters()
        {
            return array(
                'accessControl',
            );
        }

        public function accessRules()
        {
            return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('test'),
				'roles'=>array('user'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
        }
        
        
        public function actionRequests()
        {
            $model=new Requests('user');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Requests']))
                    $model->attributes=$_GET['Requests'];

            $this->render('requests',array(
                    'model'=>$model,
            ));
            
        }
    
}
?>
