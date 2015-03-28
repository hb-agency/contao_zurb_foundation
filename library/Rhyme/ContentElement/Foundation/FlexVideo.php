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
 * Class FlexVideo
 *
 * Creates a Flex Video Resposive Video Element
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
 * @package    Zurb_Foundation
 */
class FlexVideo extends Zurb_Foundation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_foundation_flexvideo';


	/**
	 * Extend the parent method
	 * @return string
	 */
	public function generate()
	{
		if ($this->foundation_flexvideo == '')
		{
			return '';
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$this->Template->size = '';
		$this->Template->classes = '';

		// Set the size
		if ($this->playerSize != '')
		{
			$size = deserialize($this->playerSize);

			if (is_array($size))
			{
				$this->Template->size = ' width="' . $size[0] . '" height="' . $size[1] . '"';
			}
		}
		
		//Add Vimeo class if detected
		if(stripos($this->foundation_flexvideo, 'vimeo') !== false)
		{
			$this->Template->classes .= ' vimeo';
		}

	}
}
