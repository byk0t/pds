<?php
/* @var $this StocksController */
/* @var $model Stocks */

$this->breadcrumbs=array(
	'Склады'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список складов', 'url'=>array('index')),
	array('label'=>'Добавить склад', 'url'=>array('create')),
	array('label'=>'Редактировать склад', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить склад', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление складами', 'url'=>array('admin')),
);
?>

<h1>Обзор склада #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address',
		'type',
	),
)); ?>
