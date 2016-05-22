<?php
/**
 * @var string $content
 * @var $this Controller
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="ru" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',[
    'fixed' => false,
    'items'=>[
        [
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>[
                ['label'=>'TEST', 'url'=>['/site/test']],
            ],
        ],
    ],
]); ?>

<div class="container" id="page">

    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', [
            'links'=>$this->breadcrumbs,
        ]); ?>
    <?php endif?>
    <?php echo $content; ?>
</div>

</body>
</html>
