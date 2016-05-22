<?php
/**
 * TbTabs class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */

Yii::import('bootstrap.widgets.TbMenu');

/**
 * Bootstrap JavaScript tabs widget.
 * @see http://twitter.github.com/bootstrap/javascript.html#tabs
 */
class TbTabs extends CWidget
{
	// Tab placements.
	const PLACEMENT_ABOVE = 'above';
	const PLACEMENT_BELOW = 'below';
	const PLACEMENT_LEFT = 'left';
	const PLACEMENT_RIGHT = 'right';

	/**
	 * @var string the type of tabs to display. Defaults to 'tabs'. Valid values are 'tabs' and 'pills'.
	 * Please not that Javascript pills are not fully supported in Bootstrap yet!
	 * @see TbMenu::$type
	 */
	public $type = TbMenu::TYPE_TABS;
	/**
	 * @var string the placement of the tabs.
	 * Valid values are 'above', 'below', 'left' and 'right'.
	 */
	public $placement;
	/**
	 * @var array the tab configuration.
	 */
	public $tabs = [];
	/**
	 * @var boolean whether to encode item labels.
	 */
	public $encodeLabel = true;
	/**
	 * @var string[] the Javascript event handlers.
	 */
	public $events = [];
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = [];

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		if (!isset($this->htmlOptions['id']))
			$this->htmlOptions['id'] = $this->getId();

		$classes = [];

		$validPlacements = [self::PLACEMENT_ABOVE, self::PLACEMENT_BELOW, self::PLACEMENT_LEFT, self::PLACEMENT_RIGHT];

		if (isset($this->placement) && in_array($this->placement, $validPlacements))
			$classes[] = 'tabs-'.$this->placement;

		if (!empty($classes))
		{
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' '.$classes;
			else
				$this->htmlOptions['class'] = $classes;
		}
	}

	/**
	 * Run this widget.
	 */
	public function run()
	{
		$id = $this->id;
		$content = [];
		$items = $this->normalizeTabs($this->tabs, $content);

		ob_start();
		$this->controller->widget('bootstrap.widgets.TbMenu', [
			'type'=>$this->type,
			'encodeLabel'=>$this->encodeLabel,
			'items'=>$items,
		]);
		$tabs = ob_get_clean();

		ob_start();
		echo '<div class="tab-content">';
		echo implode('', $content);
		echo '</div>';
		$content = ob_get_clean();

		echo CHtml::openTag('div', $this->htmlOptions);
		echo $this->placement === self::PLACEMENT_BELOW ? $content.$tabs : $tabs.$content;
		echo '</div>';

		/** @var CClientScript $cs */
		$cs = Yii::app()->getClientScript();
		$cs->registerScript(__CLASS__.'#'.$id, "jQuery('#{$id}').tab('show');");

		foreach ($this->events as $name => $handler)
		{
			$handler = CJavaScript::encode($handler);
			$cs->registerScript(__CLASS__.'#'.$id.'_'.$name, "jQuery('#{$id}').on('{$name}', {$handler});");
		}
	}

	/**
	 * Normalizes the tab configuration.
	 * @param array $tabs the tab configuration
	 * @param array $panes a reference to the panes array
	 * @param integer $i the current index
	 * @return array the items
	 */
	protected function normalizeTabs($tabs, &$panes, &$i = 0)
	{
		$id = $this->getId();
		$items = [];

		foreach ($tabs as $tab)
		{
			$item = $tab;

			if (isset($item['visible']) && $item['visible'] === false)
				continue;

			if (!isset($item['itemOptions']))
				$item['itemOptions'] = [];

			$item['linkOptions']['data-toggle'] = 'tab';

			if (isset($tab['items']))
				$item['items'] = $this->normalizeTabs($item['items'], $panes, $i);
			else
			{
				if (!isset($item['id']))
					$item['id'] = $id.'_tab_'.($i + 1);

				$item['url'] = '#'.$item['id'];

				if (!isset($item['content']))
					$item['content'] = '';

				$content = $item['content'];
				unset($item['content']);

				if (!isset($item['paneOptions']))
					$item['paneOptions'] = [];

				$paneOptions = $item['paneOptions'];
				unset($item['paneOptions']);

				$paneOptions['id'] = $item['id'];

				$classes = ['tab-pane fade'];

				if (isset($item['active']) && $item['active'])
					$classes[] = 'active in';

				$classes = implode(' ', $classes);
				if (isset($paneOptions['class']))
					$paneOptions['class'] .= ' '.$classes;
				else
					$paneOptions['class'] = $classes;

				$panes[] = CHtml::tag('div', $paneOptions, $content);

				$i++; // increment the tab-index
			}

			$items[] = $item;
		}

		return $items;
	}
}
