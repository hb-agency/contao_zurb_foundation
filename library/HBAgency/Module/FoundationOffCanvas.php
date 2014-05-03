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
namespace HBAgency\Module;

use Contao\Module as Contao_Module;

/**
 * Class FoundationNavTopBar 
 *
 * Navigation Module that creates a Foundation Top Bar responsive nav
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class FoundationOffCanvas extends Contao_Module
{
    
    /**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_foundation_offcanvas';

    /**
	 * Do not display the module if there are no menu items
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['foundation_offcanvas'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		
		return parent::generate();
	}
	
	/**
	 * Generate the module
	 */
	protected function compile()
	{
	    //Add offcanvas classes
	    $arrCssID = $this->cssID;
		$arrCssID[1] .= (!empty($arrCssID[1]) ?  ' ' : '') . $this->foundation_offcanvas_side . '-off-canvas-menu';
	    $this->cssID = $arrCssID;
	    
	    $arrModules = deserialize($this->foundation_modules);
	    
	    $strBuffer = '';
	    
	    foreach($arrModules as $arrModule)
	    {
    	    $strBuffer .= $this->getFrontendModule($arrModule['module']);
	    }
	    
	    $this->Template->items = $strBuffer;

	}
	
	
}