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
 
 namespace HBAgency\Foundation;
 
/**
 * Class SCSS
 *
 * Handles compiling the Foundation SCSS
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class SCSS extends \Controller
{

    /**
     * Confirm that all dependencies are in place
     * @return bool
     */
    public static function confirmDependencies()
    {    
    	// !TODO - actually confirm everything and throw Exceptions
    	if(!defined('COMPOSER_DIR_RELATIVE')) {
	    	return false;
    	}
    	
		return true;
    }
    
    
    /**
     * Compile the SCSS
     * @param \Contao\ThemeModel
     * @param boolean
     */
    public static function compile(\Contao\ThemeModel $objTheme, $blnForce=false)
    {    
    	if(!self::confirmDependencies()) {
    		return;
    	}
    	
    	//Get file key
    	$strKey = self::getKey($objTheme);
    	
    	//Set file path
    	$strCSSPath = 'assets/foundation/css/' . $strKey . '.css';
    	
    	//Compile the scss
    	if(!file_exists(TL_ROOT . '/' . $strCSSPath) || $blnForce)
    	{
			//Gather up the SCSS files in the assets/foundation/scss folder
			//This allows to work with different configs and edit defaults
			//Without affecting the original source
			$strBasePath = COMPOSER_DIR_RELATIVE . '/vendor/zurb/foundation/scss';
			$strCopyPath = 'assets/foundation/scss/' . $strKey;
			
			//Create new folder if not exists and clean it out
			$objNew = new \Folder($strCopyPath);
			$objNew->purge();
			$objOriginal = new \Folder($strBasePath);
			$objOriginal->copyTo($strCopyPath);
					
			//Apply the config
			self::applyConfig($objTheme, $strCopyPath);
			
			$strFoundationCSS = '';
			$strNormalizeCSS = '';
			
			//Create the SCSS compiler
			$objCompiler = new \scssc();
			$objCompiler->setImportPaths(TL_ROOT . '/' . $strCopyPath);
			$objCompiler->setFormatter((\Config::get('debugMode') ? 'scss_formatter' : 'scss_formatter_compressed'));
			$strFoundationContent = file_get_contents(TL_ROOT . '/' . $strCopyPath . '/foundation.scss');
			$strNormalizeContent = file_get_contents(TL_ROOT . '/' . $strCopyPath . '/normalize.scss');
			
			//Compile
			$strFoundationCSS 	= $objCompiler->compile($strFoundationContent);
			$strNormalizeCSS	= $objCompiler->compile($strNormalizeContent);
			
			//Write to single CSS file cache
			$objFile = new \File($strCSSPath);
			$objFile->write($strNormalizeCSS . "\n" . $strFoundationCSS);
			$objFile->close();
		}
		
		return $strCSSPath;	
    }
    
    /**
     * Get the file key
     * // !TODO - Add a Hook to change the key? This could get complex as we add more features
     * @param \Contao\ThemeModel
     * @return string
     */
    protected static function getKey($objConfig)
    {
    	$strKey = '';
    	
    	//Apply configs
    	$arrMediumCustom	= deserialize($objConfig->foundation_break_medium);
    	$strKey .= 'm-' . $arrMediumCustom['value'] . $arrMediumCustom['unit'];
    	$arrLargeCustom		= deserialize($objConfig->foundation_break_large);
    	$strKey .= 'l-' . $arrLargeCustom['value'] . $arrLargeCustom['unit'];
    	$arrXLargeCustom	= deserialize($objConfig->foundation_break_xlarge);
    	$strKey .= 'xl-' . $arrXLargeCustom['value'] . $arrXLargeCustom['unit'];
    	$arrXXLargeCustom	= deserialize($objConfig->foundation_break_xxlarge);
    	$strKey .= 'xxl-' . $arrXXLargeCustom['value'] . $arrXXLargeCustom['unit'];
    	
    	return $strKey=='m-l-xl-xxl-' ? 'default' : substr(md5($strKey), 0, 12);
    }
    
    /**
     * Handle changing configs in the Foundation SCSS
     * @param \Contao\ThemeModel
     * @param string
     */
    protected static function applyConfig($objConfig, $strPath)
    {
    	self::changeBreakpoints($objConfig, $strPath);
    }
    
    /**
     * Change the Foundation breakpoints
     * // !TODO - simplify this with another method, and also use custom base font size when that gets implemented
     * @param \Contao\ThemeModel
     * @param string
     */
    protected static function changeBreakpoints($objConfig, $strPath)
    {       
    	\System::loadLanguageFile('foundation');
    	 	
    	$arrRanges = $GLOBALS['TL_LANG']['FOUNDATION']['SCSS']['BREAKPOINT'];
    	
    	$arrSmallRange = $arrRanges['small'];
    	$strSmallReplace 	= '(' . implode(', ', $arrSmallRange) . ')';
    	
    	$arrMediumRange = $arrRanges['medium'];
    	$strMediumReplace 	= '(' . implode(', ', $arrMediumRange) . ')';
    	$arrMediumCustom	= deserialize($objConfig->foundation_break_medium);
    	
    	$arrLargeRange = $arrRanges['large'];
    	$strLargeReplace 	= '(' . implode(', ', $arrLargeRange) . ')';
    	$arrLargeCustom		= deserialize($objConfig->foundation_break_large);
    	
    	$arrXLargeRange = $arrRanges['xlarge'];
    	$strXLargeReplace 	= '(' . implode(', ', $arrXLargeRange) . ')';
    	$arrXLargeCustom	= deserialize($objConfig->foundation_break_xlarge);
    	
    	$arrXXLargeRange = $arrRanges['xxlarge'];
    	$strXXLargeReplace 	= '(' . implode(', ', $arrXXLargeRange) . ')';
    	$arrXXLargeCustom	= deserialize($objConfig->foundation_break_xxlarge);
    	
    	$blnReplace = false;
    	
    	if(!empty($arrMediumCustom['value']))
    	{
    		$blnReplace = true;
	    	//Set the small max value to the medium breakpoint
	    	$arrSmallRange[1] = $arrMediumCustom['value'] . $arrMediumCustom['unit'];
	    	//Now set the medium min value
	    	$fltAdd = $arrMediumCustom['unit']=='px' ? '1' : '0.063';
	    	$arrMediumRange[0] = ($arrMediumCustom['value'] + $fltAdd) . $arrMediumCustom['unit'];
    	}
    	if(!empty($arrLargeCustom['value']))
    	{
    		$blnReplace = true;
	    	//Set the medium max value to the large breakpoint
	    	$arrMediumRange[1] = $arrLargeCustom['value'] . $arrLargeCustom['unit'];
	    	//Now set the large min value
	    	$fltAdd = $arrLargeCustom['unit']=='px' ? '1' : '0.063';
	    	$arrLargeRange[0] = ($arrLargeCustom['value'] + $fltAdd) . $arrLargeCustom['unit'];
    	}
    	if(!empty($arrXLargeCustom['value']))
    	{
    		$blnReplace = true;
	    	//Set the large max value to the xlarge breakpoint
	    	$arrLargeRange[1] = $arrXLargeCustom['value'] . $arrXLargeCustom['unit'];
	    	//Now set the large min value
	    	$fltAdd = $arrXLargeCustom['unit']=='px' ? '1' : '0.063';
	    	$arrXLargeRange[0] = ($arrXLargeCustom['value'] + $fltAdd) . $arrXLargeCustom['unit'];
    	}
    	if(!empty($arrXXLargeCustom['value']))
    	{
    		$blnReplace = true;
	    	//Set the xlarge max value to the xxlarge breakpoint
	    	$arrXLargeRange[1] = $arrXXLargeCustom['value'] . $arrXXLargeCustom['unit'];
	    	//Now set the large min value
	    	$fltAdd = $arrXXLargeCustom['unit']=='px' ? '1' : '0.063';
	    	$arrXXLargeRange[0] = ($arrXXLargeCustom['value'] + $fltAdd) . $arrXXLargeCustom['unit'];
    	}
    	
    	//Replace the values if necessary
    	if($blnReplace)
    	{			
			//Replace content
			$strSmallNew 	= '(' . implode(', ', $arrSmallRange) . ')';
	    	$strMediumNew 	= '(' . implode(', ', $arrMediumRange) . ')';
	    	$strLargeNew 	= '(' . implode(', ', $arrLargeRange) . ')';
	    	$strXLargeNew 	= '(' . implode(', ', $arrXLargeRange) . ')';
	    	$strXXLargeNew 	= '(' . implode(', ', $arrXXLargeRange) . ')';
	    	
	    	$objFile = new \File($strPath . '/foundation/components/_global.scss');
			$strContent = $objFile->getContent();
			
			$strContent = str_replace($strSmallReplace, $strSmallNew, $strContent);
			$strContent = str_replace($strMediumReplace, $strMediumNew, $strContent);
			$strContent = str_replace($strLargeReplace, $strLargeNew, $strContent);
			$strContent = str_replace($strXLargeReplace, $strXLargeNew, $strContent);
			$strContent = str_replace($strXXLargeReplace, $strXXLargeNew, $strContent);
	    	
	    	$objFile->write($strContent);
	    	$objFile->close();
    	}
    	
    }

}