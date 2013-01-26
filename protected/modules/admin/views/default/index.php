<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<?php $this->widget(
  'application.extensions.OpenFlashChart2Widget.OpenFlashChart2Widget',
  array(
    'chart' => $chart,
    'width' => '100%'
  )
); ?>