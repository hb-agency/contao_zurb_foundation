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
 
 namespace HBAgency\FormField\Foundation;
 
 use HBAgency\FormField\Foundation as Zurb_Foundation;
 
/**
 * Class GenericStart
 *
 * Creates a Row element for a Foundation Row
 * Based off of "Wrapper" extension by Arne Stappen
 * @copyright  2014 HB Agency
 * @copyright  Arne Stappen 2011
 * @author     Blair Winans <bwinans@hbagency.com>
 * @author 	   Arne Stappen <http://agoat.de>
 * @package    Zurb_Foundation
 */
class GenericStart extends Zurb_Foundation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_foundation_genstart';
	
	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function parse($arrAttributes=null)
	{
	    if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$class = deserialize($this->cssID);
			$this->Template->wildcard = '### GENERIC WRAPPER START ###';
			return (!$this->tableless ? '<tr><td>' : '') . $this->Template->parse() . (!$this->tableless ? '</td></tr>' : '');
		}
		
		// Only tableless forms are supported
		if (!$this->tableless)
		{
			return '';
		}
		
		$this->Template = new \FrontendTemplate($this->strTemplate);
        $this->Template->setData($this->getData());
        return $this->Template->parse();
	}
	
	/**
	 * Generate content element
	 * @return string
	 */
	public function generate()
	{
	    // Only tableless forms are supported
		if (!$this->tableless)
		{
			return '';
		}
		
		$this->Template = new \FrontendTemplate($this->strTemplate);
		$this->Template->setData($this->getData());
        return $this->Template->parse();
	}


}