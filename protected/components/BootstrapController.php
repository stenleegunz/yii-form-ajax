<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BootstrapController extends CController
{
	public function init()
	{
		parent::init();

		Yii::app()->bootstrap;
		$this->layout = '//layouts/main';
	}

	/**
	 * Действия(ссылки), на которые можно перейти с текущей страницы
	 * @var array
	 */
	public $menu = [];

	/**
	 * @var array
	 */
	public $breadcrumbs = [];
}