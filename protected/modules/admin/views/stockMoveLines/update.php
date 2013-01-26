<?php
/* @var $this StockMoveLinesController */
/* @var $model StockMoveLines */

$this->breadcrumbs=array(
	'Позиции перемещений'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список позиций', 'url'=>array('index')),
	array('label'=>'Добавить позицию', 'url'=>array('create')),
	array('label'=>'Обзор позиции', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление позициями', 'url'=>array('admin')),
);
?>

<h1>Редактирование позиции <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>