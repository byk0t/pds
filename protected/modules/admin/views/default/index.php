<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Статистика',
);
?>
<h1>Общая информация</h1>

<?php $this->widget(
  'application.extensions.OpenFlashChart2Widget.OpenFlashChart2Widget',
  array(
    'chart' => $chart,
    'width' => '100%'
  )
); ?>