<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Вход';
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'htmlOptions' => array(
        'class' => 'form-signin'
    )
)); ?>
    <h2 class="form-signin-heading">Форма входа</h2>
    <?php echo $form->textField($model,'username', array('class' => 'input-block-level', 'placeholder'=> $model->getAttributeLabel('username'))); ?>
    <?php echo $form->error($model,'username'); ?>
    <?php echo $form->passwordField($model,'password', array('class' => 'input-block-level', 'placeholder'=> $model->getAttributeLabel('password'))); ?>
    <?php echo $form->error($model,'password'); ?>
    <?php echo CHtml::submitButton('Войти', array('class' => 'btn btn-large btn-primary')); ?>
<?php $this->endWidget(); ?>
</div><!-- form -->