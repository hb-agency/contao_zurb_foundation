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
 
 namespace HBAgency\Foundation\Installer;
 
/**
 * Class Installer
 *
 * Handles installing and upgrading the extension
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class Initializer extends \Controller
{
	
	/**
     * Set the initial theme database values so we avoid string offset errors
     * @return void
     */
    public static function run()
    {
    	$arrSet = array('value'=> '', 'unit'=> '');
    	$objDB = \Database::getInstance();
    	
    	if($objDB->fieldExists('foundation_break_medium', 'tl_theme'))
    	{
    		$arrMSet = array('foundation_break_medium' => $arrSet);
			$objDB->prepare("UPDATE tl_theme %s WHERE !(foundation_break_medium > '')")
				  ->set($arrMSet)
				  ->executeUncached();
		}
		if($objDB->fieldExists('foundation_break_large', 'tl_theme'))
    	{
    		$arrLSet = array('foundation_break_large' => $arrSet);
			$objDB->prepare("UPDATE tl_theme %s WHERE !(foundation_break_large > '')")
				  ->set($arrLSet)
				  ->executeUncached();
		}
		if($objDB->fieldExists('foundation_break_xlarge', 'tl_theme'))
    	{
    		$arrXLSet = array('foundation_break_xlarge' => $arrSet);
			$objDB->prepare("UPDATE tl_theme %s WHERE !(foundation_break_xlarge > '')")
				  ->set($arrXLSet)
				  ->executeUncached();
		}
		if($objDB->fieldExists('foundation_break_xxlarge', 'tl_theme'))
    	{
    		$arrXXLSet = array('foundation_break_xxlarge' => $arrSet);
			$objDB->prepare("UPDATE tl_theme %s WHERE !(foundation_break_xxlarge > '')")
				  ->set($arrXXLSet)
				  ->executeUncached();
		}

    }

}