<?php

/**
 * Zurb Foundation integration for Contao Open Source CMS
 *
 * Copyright (C) 2015 Rhyme Digital
 *
 * @package    Zurb_Foundation
 * @link       http://rhyme.digital
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */
 
 namespace Rhyme\FormField\Foundation;
 
 use Rhyme\FormField\Foundation as Zurb_Foundation;
 
 /**
 * Class Row
 *
 * Creates a Row element for a Foundation Row
 * Based off of "Wrapper" extension by Arne Stappen
 * @copyright  2015 Rhyme Digital
 * @copyright  Arne Stappen 2011
 * @author     Blair Winans <blair@rhyme.digital>
 * @author 	   Arne Stappen <http://agoat.de>
 * @package    Zurb_Foundation
 */
class RowStart extends Zurb_Foundation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_foundation_rowstart';
	
	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function parse($arrAttributes=null)
	{
	    if (TL_MODE == 'BE')
		{
			$this->Template = new \BackendTemplate('be_wildcard');
			$class = deserialize($this->cssID);
			$this->Template->wildcard = '### FOUNDATION ROW START ###';
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