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
define('FOUNDATION', '5.5.0');
 

/**
 * Content Elements
 */

$GLOBALS['TL_CTE']['foundation'] = array(
	'foundation_sidenav'					=> 'HBAgency\ContentElement\Foundation\SideNav',
	'foundation_rowstart'					=> 'HBAgency\ContentElement\Foundation\RowStart',
	'foundation_rowstop'					=> 'HBAgency\ContentElement\Foundation\RowStop',
	'foundation_genericstart'				=> 'HBAgency\ContentElement\Foundation\GenericStart',
	'foundation_genericstop'				=> 'HBAgency\ContentElement\Foundation\GenericStop',
	'foundation_orbitstart'					=> 'HBAgency\ContentElement\Foundation\OrbitStart',
	'foundation_orbitstop'					=> 'HBAgency\ContentElement\Foundation\OrbitStop',
	'foundation_flexvideo'					=> 'HBAgency\ContentElement\Foundation\FlexVideo',
	'foundation_interchangesingle'			=> 'HBAgency\ContentElement\Foundation\InterchangeImageSingle',
	'foundation_revealmodalwindow'          => 'HBAgency\ContentElement\Foundation\RevealModalWindow',
    'foundation_tabs'	                    => 'HBAgency\ContentElement\Foundation\Tabs',
);

/**
 * Frontend Modules
 */

array_insert($GLOBALS['FE_MOD']['application'], 4, array
(
	'foundation_offcanvas' => '\HBAgency\Module\Foundation\OffCanvas'
));

array_insert($GLOBALS['FE_MOD']['application'], 5, array
(
	'foundation_revealmodalwindow' => '\HBAgency\Module\Foundation\RevealModalWindow'
));

array_insert($GLOBALS['FE_MOD']['navigationMenu'], 8, array
(
	'foundationnav_topbar'  => '\HBAgency\Module\Foundation\NavTopBar',
	'foundation_tabbar'     => '\HBAgency\Module\Foundation\TabBar',
	'foundation_iconbar'    => '\HBAgency\Module\Foundation\IconBar',
));



/**
 * Form fields
 */
array_insert($GLOBALS['TL_FFL'], 20, array
(
	'foundation_rowstart'           => 'HBAgency\FormField\Foundation\RowStart',
	'foundation_rowstop'			=> 'HBAgency\FormField\Foundation\RowStop',
	'foundation_genericstart'		=> 'HBAgency\FormField\Foundation\GenericStart',
	'foundation_genericstop'		=> 'HBAgency\FormField\Foundation\GenericStop',
));

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] 		= array('HBAgency\Hooks\ParseTemplate\Foundation', 'run');
$GLOBALS['TL_HOOKS']['getPageLayout'][] 		= array('HBAgency\Hooks\GetPageLayout\Foundation', 'run');
$GLOBALS['TL_HOOKS']['getCombinedFile'][] 		= array('HBAgency\Hooks\GetCombinedFile\Foundation', 'run');
//$GLOBALS['TL_HOOKS']['getAttributesFromDca'][]  = array('HBAgency\Hooks\StoreTabTitles\Foundation', 'run');


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
	'modernizr'					=> 'composer/vendor/components/modernizr/modernizr.js',
	'jquerymin'					=> 'composer/vendor/components/jquery/jquery.min.js',
	'hbjquerycookie'			=> 'system/modules/zurb_foundation/assets/js/jquery.cookie.js',
	'hbplaceholder'				=> 'system/modules/zurb_foundation/assets/js/placeholder.js',
	'hbfastclick'				=> 'system/modules/zurb_foundation/assets/js/fastclick.js',
	'foundation'				=> 'composer/vendor/zurb/foundation/js/foundation/foundation.js',
	'foundationabide'			=> 'composer/vendor/zurb/foundation/js/foundation/foundation.abide.js',
	'foundationaccordion'		=> 'composer/vendor/zurb/foundation/js/foundation/foundation.accordion.js',
	'foundationalert'			=> 'composer/vendor/zurb/foundation/js/foundation/foundation.alert.js',
	'foundationclearing'		=> 'composer/vendor/zurb/foundation/js/foundation/foundation.clearing.js',
	'foundationdropdown'		=> 'composer/vendor/zurb/foundation/js/foundation/foundation.dropdown.js',
	'foundationequalizer'		=> 'composer/vendor/zurb/foundation/js/foundation/foundation.equalizer.js',
	'foundationinterchange'		=> 'composer/vendor/zurb/foundation/js/foundation/foundation.interchange.js',
	'foundationjoyride'			=> 'composer/vendor/zurb/foundation/js/foundation/foundation.joyride.js',
	'foundationmagellan'		=> 'composer/vendor/zurb/foundation/js/foundation/foundation.magellan.js',
	'foundationoffcanvas'		=> 'composer/vendor/zurb/foundation/js/foundation/foundation.offcanvas.js',
	'foundationorbit'			=> 'composer/vendor/zurb/foundation/js/foundation/foundation.orbit.js',
	'foundationreveal'			=> 'composer/vendor/zurb/foundation/js/foundation/foundation.reveal.js',
	'foundationslider'			=> 'composer/vendor/zurb/foundation/js/foundation/foundation.slider.js',
	'foundationtab'				=> 'composer/vendor/zurb/foundation/js/foundation/foundation.tab.js',
	'foundationtooltip'			=> 'composer/vendor/zurb/foundation/js/foundation/foundation.tooltip.js',
	'foundationtopbar'			=> 'composer/vendor/zurb/foundation/js/foundation/foundation.topbar.js',
);

/**
 * Purge jobs
 */
array_insert($GLOBALS['TL_PURGE']['folders'], 4, array
(
	'foundation' => array
	(
	    'callback' => array('HBAgency\Foundation\Automator', 'purgeFoundationCache'),
        'affected' => array('assets/foundation'),
    )
));

