<?php
/* @var $this ProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Продукты',
);

$this->menu=array(
	array('label'=>'Создать новый продукт', 'url'=>array('create')),
	array('label'=>'Управление продуктами', 'url'=>array('admin')),
	array('label'=>'Импорт из CSV', 'url'=>array('admin')),
	array('label'=>'Экспорт в CSV', 'url'=>array('admin')),
);
?>

<h1>Продукты</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'summaryText' => 'Показываются {start} - {end} из  {count} строк',
    'emptyText' => 'В базе данных продукты не найдены'
)); ?>
