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
 * Class InterchangeImage
 *
 * Creates a an interchange Image that can be used at several different sizes
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
 * @package    Zurb_Foundation
 */
class InterchangeImageSingle extends Zurb_Foundation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_foundation_interchangeimage';


	/**
	 * Return if the image does not exist
	 * @return string
	 */
	public function generate()
	{
		if ($this->singleSRC == '')
		{
			return '';
		}

		$objFile = \FilesModel::findByUuid($this->singleSRC);

		if ($objFile === null)
		{
			if (!\Validator::isUuid($this->singleSRC))
			{
				return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
			}

			return '';
		}

		if (!is_file(TL_ROOT . '/' . $objFile->path))
		{
			return '';
		}

		$this->singleSRC = $objFile->path;
		
        if(TL_MODE=='BE')
		{
    		$this->strTemplate = 'ce_image';
		}
		
		return parent::generate();
	}


	/**
	 * Generate the content element
	 */
	protected function compile()
	{
	    //Get the alternate sizes
	    $arrSmallSize   = deserialize($this->foundation_size_small);
	    $arrMediumSize  = deserialize($this->foundation_size_medium);
	    $arrLargeSize   = deserialize($this->foundation_size_large);
	    $arrXLargeSize  = deserialize($this->foundation_size_xlarge);
	    $arrXXLargeSize = deserialize($this->foundation_size_xxlarge);
	    
	    $this->Template->smallSrc    = TL_ASSETS_URL . \Image::get($this->singleSRC, $arrSmallSize[0], $arrSmallSize[1], $arrSmallSize[2]);
	    $this->Template->mediumSrc   = TL_ASSETS_URL . \Image::get($this->singleSRC, $arrMediumSize[0], $arrMediumSize[1], $arrMediumSize[2]);
	    $this->Template->largeSrc    = TL_ASSETS_URL . \Image::get($this->singleSRC, $arrLargeSize[0], $arrLargeSize[1], $arrLargeSize[2]);
	    $this->Template->xlargeSrc   = TL_ASSETS_URL . \Image::get($this->singleSRC, $arrXLargeSize[0], $arrXLargeSize[1], $arrXLargeSize[2]);
	    $this->Template->xxlargeSrc  = TL_ASSETS_URL . \Image::get($this->singleSRC, $arrXXLargeSize[0], $arrXXLargeSize[1], $arrXXLargeSize[2]);
	
		$this->addImageToTemplate($this->Template, $this->arrData);
	}

}
