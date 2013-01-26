<?php
/* @var $this StockMoveLinesController */
/* @var $model StockMoveLines */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-move-lines-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, обозначеные <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'move_id'); ?>
        <?php echo $form->dropDownList($model, 'move_id', CHtml::listData(StockMoves::model()->findAll(), 'id', 'id'), array('empty' => 'Выберите перемещение')); ?>
		<?php echo $form->error($model,'move_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_id'); ?>
        <?php echo $form->dropDownList($model, 'product_id', CHtml::listData(Products::model()->findAll(), 'id', 'name'), array('empty' => 'Выберите продукт')); ?>
		<?php echo $form->error($model,'product_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->