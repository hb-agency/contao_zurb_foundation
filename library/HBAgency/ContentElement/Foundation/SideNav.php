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
 
 use Contao\ModuleQuicklink as Contao_Quicklink;
 
 /**
 * Class SideNav
 *
 * Creates a side nav using the Foundation framework
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class SideNav extends Contao_Quicklink
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_foundation_sidenav';
	
	
	/**
	 * Redirect to the selected page
	 * @return string
	 */
	public function generate()
	{
		// Always return an array (see #4616)
		$this->pages = deserialize($this->foundation_pages, true);

		if (empty($this->pages) || $this->pages[0] == '')
		{
			return '';
		}

		return parent::generate();
	}
	
	/**
	 * Generate content element
	 * @return string
	 */
	protected function compile()
	{
		parent::compile();
	}

}