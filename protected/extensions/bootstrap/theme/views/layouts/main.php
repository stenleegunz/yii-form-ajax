<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',[
    'items'=>[
        [
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>[
                ['label'=>'Home', 'url'=>['/site/index']],
                ['label'=>'About', 'url'=>['/site/page', 'view'=>'about']],
                ['label'=>'Contact', 'url'=>['/site/contact']],
                ['label'=>'Login', 'url'=>['/site/login'], 'visible'=>Yii::app()->user->isGuest],
                ['label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>['/site/logout'], 'visible'=>!Yii::app()->user->isGuest]
            ],
        ],
    ],
]); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', [
			'links'=>$this->breadcrumbs,
		]); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
