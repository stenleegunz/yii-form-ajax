<?php
/**
 * @var SiteController $this
 * @var TbActiveForm $form
 * @var MathModel $model
 */
?>
<h1>HELLO!!!!</h1>
<script>
    (function($){
        $(document).ready(function(){
            var button = '.math-btn',
                firstNumber = 'input[name="MathModel[firstNumber]"]',
                secondNumber = 'input[name="MathModel[secondNumber]"]';
            $('body')
                .on('click', button, function (e) {
                    console.log('test');
                    var firstNumberVal = $(firstNumber).val(),
                        secondNumberVal = $(secondNumber).val();

                    var url = 'http://dima.com:8080/site/MathNumbers';

                    if (firstNumberVal && secondNumberVal) {
                        console.log(firstNumberVal);
                        console.log(secondNumberVal);
                        $.post(url, {
                            firstNumber: firstNumberVal,
                            secondNumber: secondNumberVal
                        }, function (data) {

                            console.log(data);
                        });
                    }
                });

        });
    })(jQuery);
</script>
<?php
   $form = $this->beginWidget(BootstrapHelper::TB_ACTIVE_FORM_PATH, [
        'type'=>'inline',
        'method' => null,
        'id' => 'test',
        'htmlOptions' => ['class'=>'well', 'style' => 'width: 1000px; margin: 0 auto;'],
    ]);

    echo $form->numberField($model, 'firstNumber', ['placeholder' => $model->getAttributeLabel('firstNumber')]);
    echo '&nbsp';
    echo $form->label($model, 'sum');
    echo '&nbsp';
    echo $form->numberField($model, 'secondNumber', ['placeholder' => $model->getAttributeLabel('secondNumber')]);
    echo '&nbsp;';
    echo CHtml::button('Посчитать', ['class' => 'btn math-btn']);

    echo '&nbsp';

    ?>
        <span class='label label-info' style="padding: 7px 4px; font-size: 14px;">Результат: </span>
    <?php

    $this->endWidget(['test']);
?>

