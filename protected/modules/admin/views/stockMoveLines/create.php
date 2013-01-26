<?php
/* @var $this StockMoveLinesController */
/* @var $model StockMoveLines */

$this->breadcrumbs=array(
	'Позиции перемещений'=>array('index'),
	'Создать позицию',
);

$this->menu=array(
	array('label'=>'Список позиций', 'url'=>array('index')),
	array('label'=>'Управление позициями', 'url'=>array('admin')),
);
?>

<h1>Добавление новой позиции для перемещения</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>