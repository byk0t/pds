<?php
/* @var $this StocksController */
/* @var $model Stocks */

$this->breadcrumbs=array(
	'Склады'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список складов', 'url'=>array('index')),
	array('label'=>'Добавить склад', 'url'=>array('create')),
	array('label'=>'Обзор склада', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление складами', 'url'=>array('admin')),
);
?>

<h1>Редактирование склада <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>