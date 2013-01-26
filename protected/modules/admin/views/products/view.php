<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Продукты'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список продуктов', 'url'=>array('index')),
	array('label'=>'Создать продукт', 'url'=>array('create')),
	array('label'=>'Изменить продукт', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить продукт', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить данный продукт?')),
	array('label'=>'Управление продуктами', 'url'=>array('admin')),
);
?>

<h1>Обзор продукта #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'description',
	),
)); ?>
