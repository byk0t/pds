<?php

class SiteController extends Controller
{
    
    /**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
    
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('secret'),
                'users'=>array('?'),
            ),           
        );
    }

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $this->redirect('login');
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
            {
                if(Yii::app()->user->checkRole('user'))
                    $this->redirect(Yii::app()->createUrl('admin'));                
                elseif(Yii::app()->user->checkRole('administrator'))
                    $this->redirect(Yii::app()->createUrl('admin'));
                else
                    $this->redirect(Yii::app()->user->returnUrl);
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    
    public function actionRequest()
    {
        $model = new RequestForm();
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='request-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['RequestForm']))
        {
                $model->attributes=$_POST['RequestForm'];
                // validate user input and redirect to the previous page if valid
                if($model->validate())
                {
                    Requests::model()->addAuthRequest($_POST['RequestForm']);
                    Yii::app()->user->setFlash('success', "Заказ успешно отправлен СТО");
                }
        }
        
        $this->render('request', array('model' => $model));
    }
    
        public function actionRegister()
	{
		$model=new RegisterForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['RegisterForm']))
		{
			$model->attributes=$_POST['RegisterForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate())
                        {
                            Users::model()->register($_POST['RegisterForm']);
				$this->redirect(Yii::app()->user->returnUrl);
                        }
		}
		// display the login form
		$this->render('register',array('model'=>$model));
	}
        
        
        public function actionRegisterSto()
        {
                $model=new RegisterStoForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['RegisterStoForm']))
		{
			$model->attributes=$_POST['RegisterStoForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate())
                        {
                            $sto = new Sto;
                            $sto->attributes = $_POST['RegisterStoForm'];
                            $sto->phones = serialize($sto->phones);
                            $sto->save();
                            Users::model()->register(array_merge($_POST['RegisterStoForm'], array('sto_id'=>$sto->id)), 'sto');
                            $this->redirect(Yii::app()->user->returnUrl);
                        }
		}
		// display the login form
		$this->render('registerSto',array('model'=>$model));
        }
}