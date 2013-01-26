<?php

class DefaultController extends Controller
{
    public $layout='//layouts/column2';
        
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    
    /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('deny',  // deny all users
				'users'=>array('?'),
			),
		);
	}
    
    public function actionIndex()
	{
        OpenFlashChart2Loader::load();
        $bar = new bar_dome();
        $bar->set_values( array(9,8,7,6,5,4,3,2,1) );

        $chart = new open_flash_chart();
        $chart->set_title( new title("MyChart") );
        $chart->add_element( $bar );
		$this->render('index', array('chart' => $chart));
	}
}