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
 * Class RevealModalWindow
 *
 * Creates a an Modal dialogs, or pop-up windows that can be used at several different sizes.
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @author     Sebastijan Ribaric <sebastijan.ribaric@media-8.org>
 * @package    Zurb_Foundation
 */
class RevealModalWindow extends Zurb_Foundation
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_foundation_revealmodalwindow';

	
	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		//Compile hyperlink element fields
		$this->_compileHyperlink();
        
        //Compile articles
		if($this->foundation_incarticle)
		{
    		$strArticles = '';
    		foreach(deserialize($this->foundation_article, true) as $arrArticle)
    		{
        		if (!empty($arrArticle['article']))
        		{
            		$strArticles .= $this->getArticle($arrArticle['article'], false, true). "\n";
        		}
    		}
    		
    		$this->Template->articles = $strArticles;
		}
		
		//Compile modules
		if($this->foundation_incmodule)
		{
    		$strModules = '';
    		foreach(deserialize($this->foundation_modules, true) as $arrModule)
    		{
        		if (!empty($arrModule['module']))
        		{
            		$strModules .= $this->getFrontendModule($arrModule['module']). "\n";
        		}
    		}
    		
    		$this->Template->modules = $strModules;
		}
	}
	
	/**
	 * Generate the content element
	 * This is mostly adapted from Contao\ContentHyperlink::compile()
	 */
	protected function _compileHyperlink()
	{
		global $objPage;

		$embed = explode('%s', $this->embed);

		// Use an image instead of the title
		if ($this->useImage && $this->singleSRC != '')
		{
			$objModel = \FilesModel::findByUuid($this->singleSRC);

			if ($objModel === null)
			{
				if (!\Validator::isUuid($this->singleSRC))
				{
					$this->Template->text = '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
				}
			}
			elseif (is_file(TL_ROOT . '/' . $objModel->path))
			{
				$objFile = new \File($objModel->path, true);

				if ($objFile->isGdImage)
				{
					$size = deserialize($this->size);
					$intMaxWidth = (TL_MODE == 'BE') ? 320 : \Config::get('maxImageWidth');

					// Adjust the image size
					if ($intMaxWidth > 0  && ($size[0] > $intMaxWidth || (!$size[0] && $objFile->width > $intMaxWidth)))
					{
						$size[0] = $intMaxWidth;
						$size[1] = floor($intMaxWidth * $objFile->height / $objFile->width);
					}

					$src = \Image::get($objModel->path, $size[0], $size[1], $size[2]);

					if (($imgSize = @getimagesize(TL_ROOT . '/' . rawurldecode($src))) !== false)
					{
						$this->Template->arrSize = $imgSize;
						$this->Template->imgSize = ' ' . $imgSize[3];
					}

					$this->Template->src = TL_FILES_URL . $src;
					$this->Template->alt = specialchars($this->alt);
					$this->Template->linkTitle = specialchars($this->linkTitle);
					$this->Template->caption = $this->caption;
				}
			}
		}

		$this->Template->embed_pre = $embed[0];
		$this->Template->embed_post = $embed[1];
		$this->Template->link = $this->linkTitle;
		$this->Template->linkTitle = specialchars($this->titleText ?: $this->linkTitle);

		// Unset the title attributes in the back end (see #6258)
		if (TL_MODE == 'BE')
		{
			$this->Template->title = '';
			$this->Template->linkTitle = '';
		}
	}

}