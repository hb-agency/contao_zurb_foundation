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
 * Class IconBar 
 *
 * Creates a Foundation Icon Bar
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class IconBar extends Contao_Module
{
    
    /**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_foundation_iconbar';

    /**
	 * Do not display the module if there are no menu items
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['foundation_iconbar'][0]) . ' ###';
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
    	//Foundation only handles up to 8
    	$dictionary = array
    	(
            'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'
    	);
    	
        $arrIcons = array();
        $arrRawIcons = deserialize($this->foundation_icons);
                
        foreach($arrRawIcons as $icon)
        {
            $arrIcons[] = $this->parseIcon($icon);
        }
        
        $this->Template->icons = $arrIcons;
        $this->Template->count = $dictionary[(count($arrIcons)-1)];
	}
	
	/**
	 * Parse the icon and prepare it for the Template
	 * @param array
	 * @return array
	 */
	protected function parseIcon($icon)
	{
    	$arrIcon = array();
    	
    	//Check for image
    	if($icon['iconfile'] != '')
    	{
        	$objFile = \FilesModel::findByUuid($icon['iconfile']);

    		if ($objFile != null)
    		{
    			if (is_file(TL_ROOT . '/' . $objFile->path))
        		{
        			$arrIcon['hasImage'] = true;
        			$arrIcon['img'] = $objFile->path;
        		}
    		}
    	}
    	
    	//Add Foundation icon class
    	if(!$arrIcon['hasImage'] && $icon['iconclass'] != '')
    	{
        	$arrIcon['iconclass'] = 'fi-' . $icon['iconclass'];
    	}
    	
    	if($icon['iconclass_custom'] != '')
        {
            $arrIcon['class'] .= ' ' . $icon['iconclass_custom'];
        }
        
        if($icon['icon_label'] != '')
        {
            $arrIcon['label'] .= $icon['icon_label'];
        }
        
        $arrIcon['href'] = $icon['icon_href'];
    
        return $arrIcon;
    }
	
	
}