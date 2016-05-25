<?php

class SiteController extends BootstrapController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionTest()
	{
		$model = new MathModel();
		$this->render('test', compact('model'));
	}

	public function actionMathNumbers()
	{
		if (Y::isPostRequest($_REQUEST)) {
			Y::endJson(MathModel::mathNumbers(Y::getPost('firstNumber'), Y::getPost('secondNumber')));
		} else {
			Y::endJson(['error' => 'Не верный формат запроса']);
		}

	}

}