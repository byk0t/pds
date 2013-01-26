<?php
/* @var $this StockMoveLinesController */
/* @var $model StockMoveLines */

$this->breadcrumbs=array(
	'Позиции перемещений'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список позиций', 'url'=>array('index')),
	array('label'=>'Добавить позицию', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('stock-move-lines-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление позициями перемещений</h1>

<p>
Вы можете пользоваться операторами сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждого поискового выражения.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-move-lines-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'move_id',
        array(
            'name' => 'product_id', 
            'value' => '$data->product->name',
            'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'name')
        ),
		'quantity',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
