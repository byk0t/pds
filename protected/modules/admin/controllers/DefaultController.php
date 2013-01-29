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
		$this->render('index', array('chart' => $this->getChart()));
	}
    
    private function getChart() 
    {
        $stock_moves_stat = StockMoves::model()->getStockMovesStat();
        OpenFlashChart2Loader::load();

        function dot($col)
        {
            $default_dot = new dot();
            $default_dot
                ->size(3)
                ->halo_size(1)
                ->colour($col)
                ->tooltip('X: #x_label#<br>Y: #val#<br>#date:Y-m-d at H:i#');
            return $default_dot;
        }
        
        function green_dot()
        {
            return dot('#3D5C56');
        }
        
        $data_1 = array();
        $data_2 = array();
        
        for( $i=0; $i< sizeof($stock_moves_stat); $i++ )
        {
            
            $x = strtotime($stock_moves_stat[$i]['date']);
            $y = $stock_moves_stat[$i]['quantity']; 
            $data_1[] = new scatter_value($x, $y);

            $data_2[] = (cos($i) * 1.9) + 4;
        }
        
        $def = new hollow_dot();
        $def->size(3)->halo_size(2)->tooltip('#date:d M y#<br>Value: #val#');

        $line = new scatter_line( '#DB1750', 3 );
        $line->set_values($data_1);
        $line->set_default_dot_style( $def );

        //
        // create an X Axis object
        //
        $x = new x_axis();
        // grid line and tick every 10
        $x->set_range(
            mktime(0, 0, 0, 1, 1, date('Y')),    // <-- min == 1st Jan, this year
            mktime(0, 0, 0, 1, 31, date('Y'))    // <-- max == 31st Jan, this year
            );
        // show ticks and grid lines for every day:
        $x->set_steps(86400);

        $labels = new x_axis_labels();
        // tell the labels to render the number as a date:
        $labels->text('#date:l jS, M Y#');
        // generate labels for every day
        $labels->set_steps(86400);
        // only display every other label (every other day)
        $labels->visible_steps(2);
        $labels->rotate(90);

        // finally attach the label definition to the x axis
        $x->set_labels($labels);

        $y = new y_axis();
        $y->set_range( 0, 150 );
        $chart = new open_flash_chart();
        $chart->set_title(new title( "Движение ТМЦ" ));
        $chart->add_element( $line );
        $chart->set_x_axis( $x );
        $chart->set_y_axis( $y );

        return $chart;
    }
}