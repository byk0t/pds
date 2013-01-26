<?php
/* @var $this StockMovesController */
/* @var $data StockMoves */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_id')); ?>:</b>
	<?php echo CHtml::encode($data->from->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_id')); ?>:</b>
	<?php echo CHtml::encode($data->to->name); ?>
	<br />


</div>