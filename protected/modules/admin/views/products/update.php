<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Продукты'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список продуктов', 'url'=>array('index')),
	array('label'=>'Создать продукт', 'url'=>array('create')),
	array('label'=>'Обзор продукта', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление продуктами', 'url'=>array('admin')),
);
?>

<h1>Редактирование продукта <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>