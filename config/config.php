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
 * Foundation version
 */
define('FOUNDATION', '5.5.0');
 

/**
 * Content Elements
 */

$GLOBALS['TL_CTE']['foundation'] = array(
	'foundation_sidenav'					=> 'Rhyme\ContentElement\Foundation\SideNav',
	'foundation_rowstart'					=> 'Rhyme\ContentElement\Foundation\RowStart',
	'foundation_rowstop'					=> 'Rhyme\ContentElement\Foundation\RowStop',
	'foundation_genericstart'				=> 'Rhyme\ContentElement\Foundation\GenericStart',
	'foundation_genericstop'				=> 'Rhyme\ContentElement\Foundation\GenericStop',
	'foundation_orbitstart'					=> 'Rhyme\ContentElement\Foundation\OrbitStart',
	'foundation_orbitstop'					=> 'Rhyme\ContentElement\Foundation\OrbitStop',
	'foundation_flexvideo'					=> 'Rhyme\ContentElement\Foundation\FlexVideo',
	'foundation_interchangesingle'			=> 'Rhyme\ContentElement\Foundation\InterchangeImageSingle',
	'foundation_revealmodalwindow'          => 'Rhyme\ContentElement\Foundation\RevealModalWindow',
    'foundation_tabs'	                    => 'Rhyme\ContentElement\Foundation\Tabs',
);

/**
 * Frontend Modules
 */

array_insert($GLOBALS['FE_MOD']['application'], 4, array
(
	'foundation_offcanvas' => '\Rhyme\Module\Foundation\OffCanvas'
));

array_insert($GLOBALS['FE_MOD']['application'], 5, array
(
	'foundation_revealmodalwindow' => '\Rhyme\Module\Foundation\RevealModalWindow'
));

array_insert($GLOBALS['FE_MOD']['navigationMenu'], 8, array
(
	'foundationnav_topbar'  => '\Rhyme\Module\Foundation\NavTopBar',
	'foundation_tabbar'     => '\Rhyme\Module\Foundation\TabBar',
	'foundation_iconbar'    => '\Rhyme\Module\Foundation\IconBar',
));



/**
 * Form fields
 */
array_insert($GLOBALS['TL_FFL'], 20, array
(
	'foundation_rowstart'           => 'Rhyme\FormField\Foundation\RowStart',
	'foundation_rowstop'			=> 'Rhyme\FormField\Foundation\RowStop',
	'foundation_genericstart'		=> 'Rhyme\FormField\Foundation\GenericStart',
	'foundation_genericstop'		=> 'Rhyme\FormField\Foundation\GenericStop',
));

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] 		= array('Rhyme\Hooks\ParseTemplate\Foundation', 'run');
$GLOBALS['TL_HOOKS']['getPageLayout'][] 		= array('Rhyme\Hooks\GetPageLayout\Foundation', 'run');
$GLOBALS['TL_HOOKS']['getCombinedFile'][] 		= array('Rhyme\Hooks\GetCombinedFile\Foundation', 'run');
//$GLOBALS['TL_HOOKS']['getAttributesFromDca'][]  = array('Rhyme\Hooks\StoreTabTitles\Foundation', 'run');


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
	    'callback' => array('Rhyme\Foundation\Automator', 'purgeFoundationCache'),
        'affected' => array('assets/foundation'),
    )
));

