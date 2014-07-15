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
 
namespace HBAgency\Backend;
 
use Contao\Backend as Contao_BE;
 
 
/**
 * Class FoundationContent 
 *
 * Handles backend operations for tl_content
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class FoundationContent extends Contao_BE
{

    /**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		\System::loadLanguageFile('foundation');
		$this->import('BackendUser', 'User');
	}
	
	/**
	 * Generate Options for small columns
	 */
	public function getSmallColumnOptions()
	{
    	return static::getColumnOptions('small', 'columns');
	}
	
	/**
	 * Generate Options for medium columns
	 */
	public function getMediumColumnOptions()
	{
    	return static::getColumnOptions('medium', 'columns');
	}
	
	/**
	 * Generate Options for large columns
	 */
	public function getLargeColumnOptions()
	{
    	return static::getColumnOptions('large', 'columns');
	}
	
	/**
	 * Generate Options for small offset
	 */
	public function getSmallOffsetOptions()
	{
    	return static::getColumnOptions('small', 'offset');
	}
	
	/**
	 * Generate Options for medium offset
	 */
	public function getMediumOffsetOptions()
	{
    	return static::getColumnOptions('medium', 'offset');
	}
	
	/**
	 * Generate Options for large offset
	 */
	public function getLargeOffsetOptions()
	{
    	return static::getColumnOptions('large', 'offset');
	}
	
	/**
	 * Generate Options for small push
	 */
	public function getSmallPushOptions()
	{
    	return static::getColumnOptions('small', 'push');
	}
	
	/**
	 * Generate Options for medium push
	 */
	public function getMediumPushOptions()
	{
    	return static::getColumnOptions('medium', 'push');
	}
	
	/**
	 * Generate Options for large push
	 */
	public function getLargePushOptions()
	{
    	return static::getColumnOptions('large', 'push');
	}
	
	/**
	 * Generate Options for small pull
	 */
	public function getSmallPullOptions()
	{
    	return static::getColumnOptions('small', 'pull');
	}
	
	/**
	 * Generate Options for medium pull
	 */
	public function getMediumPullOptions()
	{
    	return static::getColumnOptions('medium', 'pull');
	}
	
	/**
	 * Generate Options for large pull
	 */
	public function getLargePullOptions()
	{
    	return static::getColumnOptions('large', 'pull');
	}
	
	
	/**
	 * Generate Options for columns, offset, push and pull
	 *
	 * @param string $strSize   The width size
	 * @param string $strType   The foundation type
	 * @param string $strSource The foundation source type
	 * @return array
	 */
    public static function getColumnOptions($strSize='small', $strType='columns', $strSource='GRID') 
    {
        $arrSizes = array();
        
        $varSizes = $GLOBALS['TL_LANG']['FOUNDATION'][strtoupper($strSource)][strtolower($strSize)][strtolower($strType)];   
        
        if(!empty($varSizes) && intVal($varSizes) > 0)
        {
            $strJoin = $strType=='columns' ? '' : '-' . $strType;
        
            for($i=1; $i<=$varSizes; $i++)
            {
                $arrSizes[($strSize . $strJoin . '-' . $i)] = sprintf($GLOBALS['TL_LANG']['MSC']['FOUNDATION'][$strType], $i);
            }
        }
        
        return $arrSizes;
    }
    
    /**
	 * Generate Tab Title
	 *
	 * @param \Contao\DataContainer $dc
	 * @param \Contao\Widget        $objWidget
	 * @return string
	 */
    public function generateTabTitle($dc, $objWidget)
    {
    	$strName    = str_replace('[article]', '[title]', $objWidget->name);
    	$strHtmlId  = str_replace('article', 'title', $objWidget->id);
    	
    	$intDCId = $dc->id;
    	$intElId = $objWidget->value;
    	
		$varValue = \Database::getInstance()->prepare("SELECT c.foundation_tabs_content FROM tl_content c WHERE c.id=?")
			                                ->execute($intDCId);
		
		$arrFoundation_tabs_content = isset($varValue->foundation_tabs_content)
			? deserialize($varValue->foundation_tabs_content)
			: array();
		
		$strValue = '';
		
    	foreach ($arrFoundation_tabs_content as $arrItem)
    	{
    		if ($intElId == $arrItem['article'] && !empty($arrItem['title']))
    		{
    			$strValue = $arrItem['title'];
    			break;
    		}	
    	}
    	
    	if (empty($strValue))
    	{
    		$strValue = 'Tab '. $intElId;
    	}
    	
    	return sprintf('<td class="operations col_last"><input type="text" name="%s" id="%s" class="tl_text_2" value="%s" onfocus="Backend.getScrollOffset()"> &nbsp; </td>',
    		$strName,
    		$strHtmlId,
    		$strValue
    	);
    }
    
}