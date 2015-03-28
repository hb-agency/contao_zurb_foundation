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
 * Class OrbitStop
 *
 * Closes out a Orbit Slider
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
 * @package    Zurb_Foundation
 */
class OrbitStop extends Zurb_Foundation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_foundation_orbitstop';
	
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
			$this->Template->wildcard = '### ORBIT SLIDER END ###';
			$this->Template->title = $this->headline;
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

	}


}