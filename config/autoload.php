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
 * Register PSR-0 namespace
 */
NamespaceClassLoader::add('Rhyme', 'system/modules/zurb_foundation/library');


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
	//Block replacements
	'block_searchable' 	        	=> 'system/modules/zurb_foundation/templates/block',
	'block_unsearchable' 	        => 'system/modules/zurb_foundation/templates/block',
	
	//Frontend
	'fe_page_foundation' 	        => 'system/modules/zurb_foundation/templates/frontend',
	
	//Content elements
	'ce_foundation_sidenav' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_rowstart' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_rowstop' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_genstart' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_genstop' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_orbitstart' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_orbitstop' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_flexvideo' 	    => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_interchangeimage'=> 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_tabs'            => 'system/modules/zurb_foundation/templates/elements',
	'ce_foundation_revealmodalwindow'=> 'system/modules/zurb_foundation/templates/elements',
	
	//Form Fields
	'form_foundation_rowstart' 	    => 'system/modules/zurb_foundation/templates/forms',
	'form_foundation_rowstop' 	    => 'system/modules/zurb_foundation/templates/forms',
	'form_foundation_genstart' 	    => 'system/modules/zurb_foundation/templates/forms',
	'form_foundation_genstop' 	    => 'system/modules/zurb_foundation/templates/forms',
	
	//Modules
	'mod_foundation_topbar' 	    => 'system/modules/zurb_foundation/templates/modules',
	'mod_foundation_iconbar' 	    => 'system/modules/zurb_foundation/templates/modules',
	'mod_foundation_offcanvas' 	    => 'system/modules/zurb_foundation/templates/modules',
	'mod_foundation_tabbar_left' 	=> 'system/modules/zurb_foundation/templates/modules',
	'mod_foundation_tabbar_right' 	=> 'system/modules/zurb_foundation/templates/modules',
	'mod_breadcrumb_foundation' 	=> 'system/modules/zurb_foundation/templates/modules',
	'mod_foundation_revealmodalwindow' 	=> 'system/modules/zurb_foundation/templates/modules',
	
	//Nav templates
    'nav_foundationleft' 	        => 'system/modules/zurb_foundation/templates/navigation',
    'nav_foundationright' 	        => 'system/modules/zurb_foundation/templates/navigation',
    'nav_sidenav' 	                => 'system/modules/zurb_foundation/templates/navigation',
    	
));
