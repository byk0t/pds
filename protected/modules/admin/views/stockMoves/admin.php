<?php
/* @var $this StockMovesController */
/* @var $model StockMoves */

$this->breadcrumbs=array(
	'Перемещения товарами'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список перемещений', 'url'=>array('index')),
	array('label'=>'Создать перемещение', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('stock-moves-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление перемещениями</h1>

<p>
Вы можете пользоваться операторами сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждого поискового выражения.
</p>

<?php echo CHtml::link('Развернутый поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-moves-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'date',
        array(
            'name' => 'user_id', 
            'value' => '$data->user->name',
            'filter' => CHtml::listData(Users::model()->findAll(), 'id', 'name')
        ),
		array(
            'name' => 'from_id', 
            'value' => '$data->from->name',
            'filter' => CHtml::listData(Stocks::model()->findAll(), 'id', 'name')
        ),
        array(
            'name' => 'to_id', 
            'value' => '$data->to->name',
            'filter' => CHtml::listData(Stocks::model()->findAll(), 'id', 'name')
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
