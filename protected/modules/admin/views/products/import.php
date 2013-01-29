<?php
/* @var $this ProductsController */
?>

<?php echo CHtml::form('/admin/products/csvImport/', 'post', array('enctype' => 'multipart/form-data')); ?>
<?php echo CHtml::fileField('csv'); ?>
<?php echo CHtml::submitButton('Загрузить', array()); ?>
<?php echo CHtml::endForm(); ?>
        
