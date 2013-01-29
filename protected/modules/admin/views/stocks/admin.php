<?php
/* @var $this StocksController */
/* @var $model Stocks */

$this->breadcrumbs=array(
	'Склады'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список складов', 'url'=>array('index')),
	array('label'=>'Добавить склад', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('stocks-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление складами</h1>

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
	'id'=>'stocks-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'address',
        array(
            'name' => 'type', 
            'value' => '$data->getType()',
            'filter' =>  Stocks::model()->getTypes()
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
    'summaryText' => 'Показываются {start} - {end} из  {count} строк',
    'emptyText' => 'В базе данных подходящие склады не найдены'
)); ?>
