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
namespace HBAgency\Hooks;



/**
 * Class FoundationGetPageLayout 
 *
 * Runs hook for \Contao\PageRegular\parseTemplate
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class FoundationGetPageLayout extends \Controller
{
	/**
	 * Modify the page or layout object - Add in Foundation JS and CSS first!
	 * @param objPage
	 * @param objPage
	 * @return void
	 */
	public function getPageLayout($objPage, &$objLayout, $objPageRegular)
	{
	    array_insert($GLOBALS['TL_JAVASCRIPT'], 0, array
        (
        	'system/modules/zurb_foundation/assets/foundation/'. FOUNDATION. '/js/vendor/modernizr.js'
        ));
	    
	    array_insert($GLOBALS['TL_JAVASCRIPT'], 1, array
        (
        	'system/modules/zurb_foundation/assets/foundation/'. FOUNDATION. '/js/vendor/jquery.js'
        ));
        
        array_insert($GLOBALS['TL_JAVASCRIPT'], 2, array
        (
        	'system/modules/zurb_foundation/assets/foundation/'. FOUNDATION. '/js/foundation.min.js'
        ));
        
        array_insert($GLOBALS['TL_CSS'], 0, array
        (
        	'system/modules/zurb_foundation/assets/foundation/'. FOUNDATION . '/css/normalize.css'
        ));
        
        array_insert($GLOBALS['TL_CSS'], 1, array
        (
        	'system/modules/zurb_foundation/assets/foundation/'. FOUNDATION . '/css/foundation.min.css'
        ));
        
        $objLayout->script .= "\n" . "<script>(function($) { $(document).foundation(); })(jQuery);</script>";

	}
}
