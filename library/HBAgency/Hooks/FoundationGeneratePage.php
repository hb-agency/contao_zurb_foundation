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
 * Class FoundationGeneratePage 
 *
 * Runs hook for \Contao\PageRegular\GeneratePage
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class FoundationGeneratePage extends \Controller
{
	/**
	 * Modify the pageRegular object to add in off-canvas wrapper
	 * @param PageModel
	 * @param PageLayout
	 * @param PageRegular
	 * @return void
	 */
	public function generatePage($objPage, $objLayout, &$objPageRegular)
	{
        //Add in custom sections for foundation off-canvas nav
        $arrSections = $objPageRegular->Template->sections;
        $arrSections['foundation_top'] = '<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">' . "\n";
        $arrSections['foundation_bottom'] = "\n" . '    </div>' . "\n" . '</div>';
        $objPageRegular->Template->sections = $arrSections;
        
	}
}
