<?php

Yii::import('bootstrap.widgets.TbActiveForm');

class ActiveForm extends TbActiveForm
{
    public function dateField($model,$attribute,$htmlOptions=array(),$type='date')
    {
	return Html::activeDateField($model,$attribute,$htmlOptions,$type);
    }
}

