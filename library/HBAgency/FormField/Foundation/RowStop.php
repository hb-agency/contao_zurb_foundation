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
 * Class Row
 *
 * Creates a Row element for a Foundation Row
 * Based off of "Wrapper" extension by Arne Stappen
 * @copyright  2014 HB Agency
 * @copyright  Arne Stappen 2011
 * @author     Blair Winans <bwinans@hbagency.com>
 * @author 	   Arne Stappen <http://agoat.de>
 * @package    Zurb_Foundation
 */
class RowStop extends Zurb_Foundation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_foundation_rowstop';
	
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
			$this->Template->wildcard = '### FOUNDATION ROW STOP ###';
			return (!$this->tableless ? '<tr><td>' : '') . $this->Template->parse() . (!$this->tableless ? '</td></tr>' : '');
		}
		
		// Only tableless forms are supported
		if (!$this->tableless)
		{
			return '';
		}
        
        return parent::parse($arrAttributes);
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
		
        return $this->Template->parse();
	}


}