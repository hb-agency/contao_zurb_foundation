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
	'foundation_sidenav'        => 'HBAgency\ContentElement\Foundation\SideNav',
	'foundation_rowstart'       => 'HBAgency\ContentElement\Foundation\RowStart',
	'foundation_rowstop'        => 'HBAgency\ContentElement\Foundation\RowStop',
	'foundation_genericstart'   => 'HBAgency\ContentElement\Foundation\GenericStart',
	'foundation_genericstop'    => 'HBAgency\ContentElement\Foundation\GenericStop',
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
 * Form fields
 */
//$GLOBALS['TL_FFL']['formcolstart'] = 'Subcolumns\\FormColStart';
//$GLOBALS['TL_FFL']['formcolpart'] = 'Subcolumns\\FormColPart';
//$GLOBALS['TL_FFL']['formcolend'] = 'Subcolumns\\FormColEnd';

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('HBAgency\Hooks\FoundationParseTemplate', 'parseTemplate');
$GLOBALS['TL_HOOKS']['getPageLayout'][] = array('HBAgency\Hooks\FoundationGetPageLayout', 'getPageLayout');


/**
 * Wrappers for Elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'foundation_rowstart';
$GLOBALS['TL_WRAPPERS']['start'][] = 'foundation_genericstart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'foundation_rowstop';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'foundation_genericstop';

/**
 * Backend styles
 */
if (TL_MODE == 'BE')
{
    $GLOBALS['TL_CSS']['foundation'] = $GLOBALS['TL_CONFIG']['debugMode']
            ? 'system/modules/zurb_foundation/assets/be_style.src.css'
            : 'system/modules/zurb_foundation/assets/be_style.css';
}


