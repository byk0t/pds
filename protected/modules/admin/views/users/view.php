<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
    array('label'=>'Изменить пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить данного пользователя?')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Обзор пользователя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'login',
        array('name'=>'password', 'value'=>'********'),
        array(
            'name' => 'role',
            'value' => ($model->role == 'user')?'Пользователь системы':'Администратор'
        )
	),
)); ?>
