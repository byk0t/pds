<?php
/* @var $this StocksController */
/* @var $model Stocks */

$this->breadcrumbs=array(
	'Склады'=>array('index'),
	'Добавление склада',
);

$this->menu=array(
	array('label'=>'Список складов', 'url'=>array('index')),
	array('label'=>'Управление складами', 'url'=>array('admin')),
);
?>

<h1>Добавление нового склада</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>