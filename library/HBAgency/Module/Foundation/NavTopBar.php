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
class NavTopBar extends Contao_Module
{
    
    /**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_foundation_topbar';

    /**
	 * Do not display the module if there are no menu items
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['foundationnav_topbar'][0]) . ' ###';
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
	    //Get wrapper and data options
	    $this->hasWrapper = false;
	    $this->hasOptions = false;
	    $arrWrapperClass = array();
	    $arrDataOptions = array();
	    if($this->foundation_nav_fixed)
	    {
    	    $this->hasWrapper = true;
    	    $arrWrapperClass[] = 'fixed';
	    }
	    if($this->foundation_nav_containtogrid)
	    {
    	    $this->hasWrapper = true;
    	    $arrWrapperClass[] = 'contain-to-grid';
	    }
	    if($this->foundation_nav_sticky)
	    {
    	    $this->hasWrapper = true;
    	    $arrWrapperClass[] = 'sticky';
    	    if($this->foundation_nav_sticky_on){
        	    $this->hasOptions = true;
        	    $arrDataOptions[] = 'sticky_on: '. $this->foundation_nav_sticky_on;
    	    }
	    }
	    if($this->foundation_nav_clickable)
	    {
	        $this->hasOptions = true;
	        $arrDataOptions[] = 'is_hover: false';
	    }
	    
	    if($this->hasOptions && !empty($arrDataOptions))
	    {
    	    $this->Template->options = ' data-options="'.implode(',', $arrDataOptions).'"';
	    }
	    if($this->hasWrapper && !empty($arrWrapperClass))
	    {
    	    $this->Template->hasWrapper = true;
    	    $this->Template->wrapperClass = implode(' ', $arrWrapperClass);
	    }
	
		$this->Template->request = ampersand(\Environment::get('indexFreeRequest'));
		$this->Template->skipId = 'skipNavigation' . $this->id;
		$this->Template->skipNavigation = specialchars($GLOBALS['TL_LANG']['MSC']['skipNavigation']);
		
		//Render left/right navigation
		if($this->foundation_nav_includeLeft)
		{
		    $this->renderFoundationNav('left');
		}
		if($this->foundation_nav_includeRight)
		{
		    $this->renderFoundationNav('right');
        }
	}
	
	/**
	 * Render left and right nav
	 */
	protected function renderFoundationNav($strSide='left')
	{
	    global $objPage;
	    
	    $strSide =          ucfirst(strtolower($strSide));
	    $strItems =         'items' . $strSide;
	    $strNavTemplate =   'foundation_nav_navigationTpl' . $strSide;
	    $strDefineRoot =    'foundation_nav_defineRoot' . $strSide;
	    $strRootPage =      'foundation_nav_rootPage' . $strSide;
	    $strLevelOffset =   'foundation_nav_levelOffset' . $strSide;
	    $strShowLevel =     'foundation_nav_showLevel' . $strSide;
	    $strHardLimit =     'foundation_nav_hardLimit' . $strSide;
	    $strShowProtected = 'foundation_nav_showProtected' . $strSide;
	
    	// Set the LEFT trail and level
		if ($this->{$strDefineRoot} && $this->{$strRootPage} > 0)
		{
			$trail = array($this->{$strRootPage});
			$level = 0;
		}
		else
		{
			$trail = $objPage->trail;
			$level = ($this->{$strLevelOffset} > 0) ? $this->{$strLevelOffset} : 0;
		}

		$lang = null;
		$host = null;
		
		// Overwrite the domain and language if the reference page belongs to a differnt root page (see #3765)
		if ($this->{$strDefineRoot} && $this->{$strRootPage} > 0)
		{
			$objRootPage = \PageModel::findWithDetails($this->{$strRootPage});

			// Set the language
			if (\Config::get('addLanguageToUrl') && $objRootPage->rootLanguage != $objPage->rootLanguage)
			{
				$lang = $objRootPage->rootLanguage;
			}

			// Set the domain
			if ($objRootPage->rootId != $objPage->rootId && $objRootPage->domain != '' && $objRootPage->domain != $objPage->domain)
			{
				$host = $objRootPage->domain;
			}
		}
		
		//Change nav settings so correct one will render
		$this->navigationTpl    = $this->{$strNavTemplate};
		$this->levelOffset      = $this->{$strLevelOffset};
		$this->showLevel        = $this->{$strShowLevel};
		$this->hardLimit        = $this->{$strHardLimit};
		$this->showProtected    = $this->{$strShowProtected};
		
		$this->Template->{$strItems} = $this->renderNavigation($trail[$level], 1, $host, $lang);
	}




}