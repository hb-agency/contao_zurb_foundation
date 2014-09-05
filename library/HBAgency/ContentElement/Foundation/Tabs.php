<?php

/**
 * Zurb Foundation integration for Contao Open Source CMS
 *
 * Copyright (C) 2014 HB Agency
 *
 * @package    Zurb_Foundation
 * @link       http://www.hbagency.com
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */
 
 namespace HBAgency\ContentElement\Foundation;
 
 use HBAgency\ContentElement\Foundation as Zurb_Foundation;
 
/**
 * Class Zurb Tabs
 *
 * Tabs are elements that help you organize and navigate multiple documents in a single container. 
 * @copyright  2014 HB Agency
 * @author     Sebastijan Ribaric <sebastijan.ribaric@media-8.org>
 * @package    Zurb_Foundation
 */
class Tabs extends Zurb_Foundation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_foundation_tabs';

	/**
	 * Extend the parent method
	 * @return string
	 */
	public function generate()
	{
		if ($this->foundation_tabs_content == '')
		{
			$this->Template->headline = '';
			$this->headline = '';
			$this->hl = '';
			return '';
		}
	
		return parent::generate();
	}
	
	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		// Compile article element
		$arrTabs = deserialize($this->foundation_tabs_content, true);
		
		if (!empty($arrTabs))
		{
			foreach ($arrTabs as &$arrItem)
			{
				if (isset($arrItem['article']))
				{
					$arrItem['content'] = \Controller::getContentElement($arrItem['article']). "\n";
				}
			}
		}

		$this->Template->tabs = $arrTabs;
		$this->Template->foundation_tabs_direction = $this->foundation_tabs_direction;

		// !@TODO
		// active tabs by url
		// in backend somehow to setup active tab
	}
}