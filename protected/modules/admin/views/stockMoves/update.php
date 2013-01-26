<?php
/* @var $this StockMovesController */
/* @var $model StockMoves */

$this->breadcrumbs=array(
	'Перемещения товаров'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список перемещений', 'url'=>array('index')),
	array('label'=>'Создать перемещение', 'url'=>array('create')),
	array('label'=>'Обзор перемещения', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление перемещениями', 'url'=>array('admin')),
);
?>

<h1>Редактирование перемещения <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>