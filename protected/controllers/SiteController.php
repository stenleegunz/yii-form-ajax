<?php

class SiteController extends BootstrapController
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionTest()
	{
		$this->render('test');
	}

}