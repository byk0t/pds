<?php
/* @var $this StockMoveLinesController */
/* @var $model StockMoveLines */

$this->breadcrumbs=array(
	'Позиции перемещений'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список позиций', 'url'=>array('index')),
	array('label'=>'Создать позицию', 'url'=>array('create')),
	array('label'=>'Изменить позицию', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить позицию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить данную позицию?')),
	array('label'=>'Управление позициями', 'url'=>array('admin')),
);
?>

<h1>Обзор позиции #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'move_id',
		 array('name' => 'product_id', 'value' => $model->product->name),
		'quantity',
	),
)); ?>
