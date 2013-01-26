<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Пользователи',
);

$this->menu=array(
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Пользователи</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'summaryText' => 'Показываются {start} - {end} из  {count} строк',
    'emptyText' => 'В базе пользователи найдены.'
)); ?>
