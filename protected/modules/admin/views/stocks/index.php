<?php
/* @var $this StocksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Склады',
);

$this->menu=array(
	array('label'=>'Создать склад', 'url'=>array('create')),
	array('label'=>'Управление складами', 'url'=>array('admin')),
);
?>

<h1>Склады</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'emptyText' => 'В базе данных склады не найдены',
    'summaryText' => 'Показываются {start} - {end} из  {count} строк',
)); ?>
