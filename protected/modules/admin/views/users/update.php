<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Обзор пользователя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Редактирование пользователя <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>