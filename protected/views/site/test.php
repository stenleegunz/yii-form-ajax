<?php
/**
 * @var SiteController $this
 * @var TbActiveForm $form
 * @var MathModel $model
 */
?>
<style>
    .label-info, .label-success, .label-important {
        padding: 7px 4px; !important;
        font-size: 14px; !important;
    }
</style>
<?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(__DIR__ . "/../assets/js/ajax-logic.js"));
?>
<?php $form = $this->beginWidget(BootstrapHelper::TB_ACTIVE_FORM_PATH, [
        'type'=>'inline',
        'method' => null,
        'id' => 'test',
        'htmlOptions' => ['class'=>'well', 'style' => 'width: 1000px; margin: 0 auto;'],
    ]); ?>

    <?= $form->numberField($model, 'firstNumber', ['placeholder' => $model->getAttributeLabel('firstNumber')]); ?>&nbsp;
    <?= $form->label($model, 'sum'); ?>&nbsp;
    <?= $form->numberField($model, 'secondNumber', ['placeholder' => $model->getAttributeLabel('secondNumber')]);?>&nbsp;
    <br><br><?= CHtml::button('Посчитать', ['class' => 'btn math-btn']);?>&nbsp;
    <span class='label label-info'>Результат: </span>&nbsp;
<?php $this->endWidget(['test']); ?>


