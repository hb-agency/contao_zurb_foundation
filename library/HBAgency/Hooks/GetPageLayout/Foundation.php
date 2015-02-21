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
namespace HBAgency\Hooks\GetPageLayout;

use HBAgency\Foundation\SCSS;


/**
 * Class FoundationGetPageLayout 
 *
 * Runs hook for \Contao\PageRegular\parseTemplate
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class Foundation extends \Controller
{
	/**
	 * Modify the page or layout object - Add in Foundation JS and CSS first!
	 * @param objPage
	 * @param objPage
	 * @return void
	 */
	public function run($objPage, &$objLayout, $objPageRegular)
	{
		// Do not combine the files in debug mode
		if (\Config::get('debugMode'))
		{
            $i=0;
    		foreach($GLOBALS['FOUNDATION_JS'] as $strFile)
    		{
    			array_insert($GLOBALS['TL_JAVASCRIPT'], $i, array
                (
                	$strFile. "|static" . ($GLOBALS['FOUNDATION_CONFIG']['async'] ? "|async" : "")
                ));
                $i++;
    		}
		}
		else
		{    	
    		//Load up our Required Foundation JS into a Combiner
    		$objCombiner = new \Combiner();
    		
    		foreach($GLOBALS['FOUNDATION_JS'] as $strFile)
    		{
    			$objCombiner->add($strFile);
    		}
    		
    	    array_insert($GLOBALS['TL_JAVASCRIPT'], 0, array
            (
            	$objCombiner->getCombinedFile('') . "|static" . ($GLOBALS['FOUNDATION_CONFIG']['async'] ? "|async" : "")
            ));
        }
		
		//Load in Foundation CSS by Theme
		array_insert($GLOBALS['TL_CSS'], 0, array
        (
        	SCSS::compile($objLayout->getRelated('pid')) . "|screen|static"
        ));
        
        //Load the foundation trigger script
        array_insert($GLOBALS['TL_JAVASCRIPT'], 9999999, array
        (
        	"system/modules/zurb_foundation/assets/js/foundation.js|static" . ($GLOBALS['FOUNDATION_CONFIG']['async'] ? "|async" : "")
        ));

	}
}
