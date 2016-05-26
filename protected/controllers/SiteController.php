<?php

class SiteController extends BootstrapController
{
	public function actionIndex()
	{
		$this->redirect('/site/test');
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
			throw new CHttpException(400, 'Bad Request');
		}

	}

}