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
 * Register PSR-0 namespace
 */
NamespaceClassLoader::add('HBAgency', 'system/modules/zurb_foundation/library');


/**
 * Register classes outside the namespace folder
 */
NamespaceClassLoader::addClassMap(array
(
    
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	//Content elements
	'ce_foundation_sidenav' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_rowstart' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_rowstop' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_genstart' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_genstop' 	    => 'system/modules/zurb_foundation/templates/elements',
	
	//Modules
	'mod_foundation_topbar' 	    => 'system/modules/zurb_foundation/templates/modules',
	'mod_foundation_offcanvas' 	    => 'system/modules/zurb_foundation/templates/modules',
	'mod_foundation_tabbar_left' 	=> 'system/modules/zurb_foundation/templates/modules',
	'mod_foundation_tabbar_right' 	=> 'system/modules/zurb_foundation/templates/modules',
	'mod_breadcrumb_foundation' 	=> 'system/modules/zurb_foundation/templates/modules',
	
	//Nav templates
    'nav_sidenav' 	                => 'system/modules/zurb_foundation/templates/navigation',
    'nav_foundationleft' 	        => 'system/modules/zurb_foundation/templates/navigation',
    'nav_foundationright' 	        => 'system/modules/zurb_foundation/templates/navigation',
    	
));
