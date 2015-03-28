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
 
 namespace Rhyme\ContentElement\Foundation;
 
 use Rhyme\ContentElement\Foundation as Zurb_Foundation;
 
 /**
 * Class GenericStart
 *
 * Creates a generic element for a Foundation wrapper
 * Based off of "Wrapper" extension by Arne Stappen
 * @copyright  2015 Rhyme Digital
 * @copyright  Arne Stappen 2011
 * @author     Blair Winans <blair@rhyme.digital>
 * @author 	   Arne Stappen <http://agoat.de>
 * @package    Zurb_Foundation
 */
class GenericStart extends Zurb_Foundation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_foundation_genstart';
	
	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
	    if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$class = deserialize($this->cssID);
			$this->Template->wildcard = '### GENERIC BLOCK START ###';
			return $this->Template->parse();
		}
        
        return parent::generate();
	}
	
	/**
	 * Generate content element
	 * @return string
	 */
	protected function compile()
	{
		// Equalize
		if($this->foundation_equalizer)
		{
            $this->Template->equalizer = 'data-equalizer';
        }
	}


}