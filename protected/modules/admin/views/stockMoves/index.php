<?php
/* @var $this StockMovesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Перемещения товаров',
);

$this->menu=array(
	array('label'=>'Создать перемещение', 'url'=>array('create')),
	array('label'=>'Управление перемещениями', 'url'=>array('admin')),
);
?>

<h1>Перемещения товаров</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'summaryText' => 'Показываются {start} - {end} из  {count} строк',
    'emptyText' => 'В базе данных перемещения не найдены'
)); ?>
