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
 

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace HBAgency\Module\Foundation;

use Contao\Module as Contao_Module;

/**
 * Class NavTopBar 
 *
 * Navigation Module that creates a Foundation Top Bar responsive nav
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class TabBar extends Contao_Module
{
    
    /**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_foundation_tabbar_left';

    /**
	 * Do not display the module if there are no menu items
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['foundation_tabbar'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		
		//Check for custom template first!
		if ($this->customTpl == '')
		{
			$this->strTemplate = 'mod_foundation_tabbar_' . $this->foundation_tabbar_title_side;
		}
		
		return parent::generate();
	}
	
	/**
	 * Generate the module
	 */
	protected function compile()
	{
	    $this->Template->title = $this->foundation_tabbar_title;

	}
	
	
}