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
 
 namespace HBAgency\ContentElement\Foundation;
 
 use HBAgency\ContentElement\Foundation as Zurb_Foundation;
 
 /**
 * Class InterchangeImage
 *
 * Creates a an interchange Image that can be used at several different sizes
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
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
	    
	    $this->Template->smallSrc  = \Image::get($this->singleSRC, $arrSmallSize[0], $arrSmallSize[1], $arrSmallSize[2]);
	    $this->Template->mediumSrc = \Image::get($this->singleSRC, $arrMediumSize[0], $arrMediumSize[1], $arrMediumSize[2]);
	    $this->Template->largeSrc  = \Image::get($this->singleSRC, $arrLargeSize[0], $arrLargeSize[1], $arrLargeSize[2]);
	
		$this->addImageToTemplate($this->Template, $this->arrData);
	}
	
	/**
	 * Get the path to the resized image
	 */
	protected static function getResponsiveImage($arrSize, $strSrc)
	{
	    $varImagePath = null;
	    
	    if($arrSize[0] > 0 || $arrSize[1] > 0)
	    {
    	    $varImagePath = \Image::get($strSrc, $arrSize[0], $arrSize[1], $arrSize[3]);
	    }
	    
	    return $varImagePath;
	}
}


