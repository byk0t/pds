<?php
/* @var $this StockMovesController */
/* @var $model StockMoves */

$this->breadcrumbs=array(
	'Перемещения товаров'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список перемещений', 'url'=>array('index')),
	array('label'=>'Создать перемещение', 'url'=>array('create')),
	array('label'=>'Редактировать перемещение', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить перемещение', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить данное перемещение?')),
	array('label'=>'Управление перемещениями', 'url'=>array('admin')),
);
?>

<h1>Обзор перемещения #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
        array('name' => 'user_id', 'value' => $model->user->name),
		array('name' => 'from_id', 'value' => $model->from->name),
		array('name' => 'to_id', 'value' => $model->to->name),
	),
)); ?>
<br/><br/>
<h3>Позиции</h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-move-lines-grid',
	'dataProvider'=>$lines->search(),
	'columns'=>array(
		'id',
        array(
            'name' => 'product_id', 
            'value' => '$data->product->name',
            'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'name')
        ),
		'quantity',
	),
)); ?>

