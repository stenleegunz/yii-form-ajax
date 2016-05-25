<?php

class MathModel extends CFormModel
{

    /**
     * @var int
     */
    public $firstNumber;

    /**
     * @var int
     */
    public $secondNumber;

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'firstNumber' => 'Первое число',
            'secondNumber' => 'Второе число',
            'sum' => '+'
        ];
    }


    public static function mathNumbers($firstNumber, $secondNumber)
    {
        if (is_numeric($firstNumber) && is_numeric($secondNumber)) {
           return ['mathResult' => $firstNumber + $secondNumber];
        } else {
            return ['error' => 'Переданы не верные входные данные'];
        }
    }

}