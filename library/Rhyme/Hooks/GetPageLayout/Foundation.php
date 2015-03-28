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
 

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Rhyme\Hooks\GetPageLayout;

use Rhyme\Foundation\SCSS;


/**
 * Class FoundationGetPageLayout 
 *
 * Runs hook for \Contao\PageRegular\parseTemplate
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
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
		//Load up our Required Foundation JS into a Combiner
		$objCombiner = new \Combiner();
		
		foreach($GLOBALS['FOUNDATION_JS'] as $strFile)
		{
			$objCombiner->add($strFile);
		}
		
	    array_insert($GLOBALS['TL_JAVASCRIPT'], 0, array
        (
        	$objCombiner->getCombinedFile() . "|static"
        ));
		
		//Load in Foundation CSS by Theme
		array_insert($GLOBALS['TL_CSS'], 0, array
        (
        	SCSS::compile($objLayout->getRelated('pid')) . "|screen|static"
        ));
        
        $objLayout->script .= "\n" . "<script>(function($) { $(document).foundation(); })(jQuery);</script>";

	}
}
