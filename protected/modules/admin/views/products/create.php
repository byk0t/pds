<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Продукты'=>array('index'),
	'Создать новый',
);

$this->menu=array(
	array('label'=>'Список продуктов', 'url'=>array('index')),
	array('label'=>'Управление продуктами', 'url'=>array('admin')),
);
?>

<h1>Создание нового продукта</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>