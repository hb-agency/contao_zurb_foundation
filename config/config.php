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
 * Foundation version
 */
define('FOUNDATION', '5.2.2');
 
 
/**
 * Content Elements
 */

$GLOBALS['TL_CTE']['foundation'] = array(
	'foundation_sidenav'                  => 'HBAgency\ContentElement\Foundation\SideNav',
	'foundation_rowstart'                 => 'HBAgency\ContentElement\Foundation\RowStart',
	'foundation_rowstop'                  => 'HBAgency\ContentElement\Foundation\RowStop',
	'foundation_genericstart'             => 'HBAgency\ContentElement\Foundation\GenericStart',
	'foundation_genericstop'              => 'HBAgency\ContentElement\Foundation\GenericStop',
	'foundation_orbitstart'   	          => 'HBAgency\ContentElement\Foundation\OrbitStart',
	'foundation_orbitstop'    	          => 'HBAgency\ContentElement\Foundation\OrbitStop',
	'foundation_flexvideo'    	          => 'HBAgency\ContentElement\Foundation\FlexVideo',
	'foundation_interchangeimagesingle'   => 'HBAgency\ContentElement\Foundation\InterchangeImageSingle',
);

/**
 * Frontend Modules
 */

array_insert($GLOBALS['FE_MOD']['application'], 4, array
(
	'foundation_offcanvas' => '\HBAgency\Module\FoundationOffCanvas'
));


array_insert($GLOBALS['FE_MOD']['navigationMenu'], 8, array
(
	'foundationnav_topbar' => '\HBAgency\Module\FoundationNavTopBar',
	'foundation_tabbar' => '\HBAgency\Module\FoundationTabBar'
));



/**
 * Form fields !TODO
 */


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] 		= array('HBAgency\Hooks\FoundationParseTemplate', 'parseTemplate');
$GLOBALS['TL_HOOKS']['getPageLayout'][] 		= array('HBAgency\Hooks\FoundationGetPageLayout', 'getPageLayout');
$GLOBALS['TL_HOOKS']['getCombinedFile'][] 		= array('HBAgency\Hooks\FoundationGetCombinedFile', 'getCombinedFile');


/**
 * Wrappers for Elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] 	= 'foundation_rowstart';
$GLOBALS['TL_WRAPPERS']['start'][] 	= 'foundation_genericstart';
$GLOBALS['TL_WRAPPERS']['start'][] 	= 'foundation_orbitstart';
$GLOBALS['TL_WRAPPERS']['stop'][] 	= 'foundation_rowstop';
$GLOBALS['TL_WRAPPERS']['stop'][] 	= 'foundation_genericstop';
$GLOBALS['TL_WRAPPERS']['stop'][] 	= 'foundation_orbitstop';

/**
 * Backend styles
 */
if (TL_MODE == 'BE')
{
    $GLOBALS['TL_CSS']['foundation'] = $GLOBALS['TL_CONFIG']['debugMode']
            ? 'system/modules/zurb_foundation/assets/be_style.src.css'
            : 'system/modules/zurb_foundation/assets/be_style.css';
}

/**
 * Foundation JS array for combiner
 */
$GLOBALS['FOUNDATION_JS'] = array
(
	'composer/vendor/components/modernizr/modernizr.js',
	'composer/vendor/components/jquery/jquery.min.js',
	'system/modules/zurb_foundation/assets/js/jquery.cookie.js',
	'system/modules/zurb_foundation/assets/js/placeholder.js',
	'system/modules/zurb_foundation/assets/js/fastclick.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.abide.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.accordion.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.alert.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.clearing.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.dropdown.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.equalizer.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.interchange.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.joyride.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.magellan.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.offcanvas.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.orbit.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.reveal.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.slider.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.tab.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.tooltip.js',
	'composer/vendor/zurb/foundation/js/foundation/foundation.topbar.js',
);


