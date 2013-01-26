<?php
/* @var $this StockMovesController */
/* @var $model StockMoves */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-moves-form',
    'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, обозначеные <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->dateField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

    <?php echo $form->hiddenField($model,'user_id', array('value' => Yii::app()->user->id)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'from_id'); ?>
        <?php echo $form->dropDownList($model, 'from_id', CHtml::listData(Stocks::model()->findAll(), 'id', 'name'), array('empty' => 'Выберите склад')); ?>
		<?php echo $form->error($model,'from_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to_id'); ?>
		<?php echo $form->dropDownList($model,'to_id', CHtml::listData(Stocks::model()->findAll(), 'id', 'name'), array('empty' => 'Выберите склад')); ?>
		<?php echo $form->error($model,'to_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Обновить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->