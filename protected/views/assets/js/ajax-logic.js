(function($){
    $(document).ready(function(){
        var button = '.math-btn',
            firstNumber = 'input[name="MathModel[firstNumber]"]',
            secondNumber = 'input[name="MathModel[secondNumber]"]',
            labelInfo = '.label-info';
        $('body')
            .on('click', button, function () {
                var firstNumberVal = $(firstNumber).val(),
                    secondNumberVal = $(secondNumber).val(),
                    infoImportant = $('.label.label-important'),
                    infoSuccess = $('.label.label-success'),
                    labels = {infoSuccess: infoSuccess, infoImportant: infoImportant},
                    url = 'http://ajax-test.com:8080/site/MathNumbers';

                removeInfo(labels);
                if (firstNumberVal && secondNumberVal) {
                    $.post(url, {
                            firstNumber: firstNumberVal,
                            secondNumber: secondNumberVal
                        })
                        .done(function (data) {
                            if (data.mathResult) {
                                $('<span class="label label-success"">' + data.mathResult + '</span>')
                                    .insertAfter(labelInfo);
                            } else if (data.error) {
                                $('<span class="label label-important">' + data.error + '</span>')
                                    .insertAfter(labelInfo);
                            } else {
                                $('<span class="label label-important">Неверный формат данных от сервера</span>')
                                    .insertAfter(labelInfo);
                            }
                        })
                        .fail(function (error) {
                            $('<span class="label label-important">' + error.statusText + ' ' + error.status + '</span>')
                                .insertAfter(labelInfo);
                        });
                } else {
                    $('<span class="label label-important">Введите оба числа!</span>').insertAfter(labelInfo);

                }
            });

    });
})(jQuery);
function removeInfo (labels) {
    $.each(labels, function (name, label) {
        if (label.length) {
            label.remove();
        }
    });

}