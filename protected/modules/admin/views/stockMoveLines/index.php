<?php
/* @var $this StockMoveLinesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Позиции перемещений',
);

$this->menu=array(
	array('label'=>'Добавить позицию', 'url'=>array('create')),
	array('label'=>'Управление позициями', 'url'=>array('admin')),
);
?>

<h1>Позиции перемещений</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
