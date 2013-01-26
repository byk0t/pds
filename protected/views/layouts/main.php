<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/admin/') , 'active' => Yii::app()->controller->id == 'default'),
                array('label'=>'Продукты', 'url'=>array('/admin/products/') , 'active' => Yii::app()->controller->id == 'products'),
                array('label'=>'Склады', 'url'=>array('/admin/stocks/'), 'active' => Yii::app()->controller->id == 'stocks'),
                array('label'=>'Перемещения товаров', 'url'=>array('/admin/stockMoves/'), 'active' => Yii::app()->controller->id == 'stockMoves'),
                array('label'=>'Позиции перемещений', 'url'=>array('/admin/stockMoveLines/'), 'active' => Yii::app()->controller->id == 'stockMoveLines'),
                array('label'=>'Управление пользователями', 'url'=>array('/admin/users/'), 'active' => Yii::app()->controller->id == 'users', 'visible'=>Yii::app()->user->isAdmin() ),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
            'homeLink' => CHtml::link('Главная', array('/admin'))
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
        Котович П.С., гр. 982321 <br/>
		Система распределения продукции.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
