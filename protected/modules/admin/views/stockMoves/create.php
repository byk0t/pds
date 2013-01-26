<?php
/* @var $this StockMovesController */
/* @var $model StockMoves */

$this->breadcrumbs=array(
	'Перемещения товаров'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список перемещений', 'url'=>array('index')),
	array('label'=>'Управление перемещениями', 'url'=>array('admin')),
);
?>

<h1>Создание перемещения</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>