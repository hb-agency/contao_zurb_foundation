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
 * Class RevealModalWindow
 *
 * Navigation Module that creates a Foundation Top Bar responsive nav
 * @copyright  2014 HB Agency
 * @author     Sebastijan Ribaric <sebastijan.ribaric@media-8.org>
 * @package    Zurb_Foundation
 */
class RevealModalWindow extends Contao_Module
{
    
    /**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_foundation_revealmodalwindow';

    /**
	 * Construct the module
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['foundation_revealmodalwindow'][0]) . ' ###';
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
		//Compile hyperlink element
		$this->Template->revHyperlink = $this->_compileHyperlink();
	
		// Compile article element
		$articles = empty($this->cteAlias)
		? null
		: deserialize($this->cteAlias);
		
		$this->Template->revIncludeArticle = '';
		if (!empty($articles))
			foreach ($articles as $item)
			{
				if (isset($item['article']))
					$this->Template->revIncludeArticle .= $this->getContentElement($item['article']). "\n";
			}
		
		
		// Compile module element
		$modules =  empty($this->foundation_modules)
		? null
		: deserialize($this->foundation_modules);
		
		$this->Template->revIncludeModule = '';
		if (!empty($modules))
    		foreach ($modules as $item)
    		{
    			if (isset($item['module']))
    				$this->Template->revIncludeModule .= $this->getFrontendModule($item['module']). "\n";
    		}
	
		// Link trigger style
		$this->Template->revealModalButt = $this->foundation_button;
		$this->Template->headline = '';
		$this->headline = '';
		$this->hl = '';

	}
	
	/**
	 * Generate the hyperlink module
	 */
	protected function _compileHyperlink()
	{
		global $objPage;
	
		if (substr($this->url, 0, 7) == 'mailto:')
		{
			$this->url = \String::encodeEmail($this->url);
		}
		else
		{
			$this->url = ampersand($this->url);
		}
	
		$embed = explode('%s', $this->embed);
	
		if ($this->linkTitle == '')
		{
			$this->linkTitle = $this->url;
		}
	
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
				$this->subTemplate = new \FrontendTemplate('ce_hyperlink_image');
				$this->subTemplate->setData($this->arrData);
	
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
						$this->subTemplate->arrSize = $imgSize;
						$this->subTemplate->imgSize = ' ' . $imgSize[3];
					}
	
					$this->subTemplate->src = TL_FILES_URL . $src;
					$this->subTemplate->alt = specialchars($this->alt);
					$this->subTemplate->linkTitle = specialchars($this->linkTitle);
					$this->subTemplate->caption = $this->caption;
				}
			}
		} else {
			
			$this->subTemplate = new \FrontendTemplate('ce_hyperlink');
			$this->subTemplate->setData($this->arrData);
		}
	
		$this->subTemplate->rel = $this->rel; // Backwards compatibility
		$this->subTemplate->href = $this->url;
		$this->subTemplate->embed_pre = $embed[0];
		$this->subTemplate->embed_post = $embed[1];
		$this->subTemplate->link = $this->linkTitle;
		$this->subTemplate->linkTitle = specialchars($this->titleText ?: $this->linkTitle);
		$this->subTemplate->target = '';
	
	
		// Override the link target
		if ($this->target)
		{
			$this->subTemplate->target = ($objPage->outputFormat == 'xhtml') ? ' onclick="return !window.open(this.href)"' : ' target="_blank"';
		}
	
		// Unset the title attributes in the back end (see #6258)
		if (TL_MODE == 'BE')
		{
			$this->subTemplate->title = '';
			$this->subTemplate->linkTitle = '';
		}
	
		return $this->subTemplate->parse();
	}
		
}