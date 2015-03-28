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
 * Fields
 */ 
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_title']               = array('Title', 'Enter a title for the navigation. If blank, no title will be included in the top bar.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_menuicon']            = array('Menu icon title', 'Enter a menu icon title for the navigation. If blank, no menu icon title will be included in the top bar.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_fixed']               = array('Fixed nav?', 'Check to make this a fixed nav option.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_containtogrid']       = array('Contain to grid?', 'Check to make this nav contained to the grid width.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_sticky']              = array('Make sticky?', 'Check to make this nav sticky.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_sticky_on']           = array('Sticky on single width only', 'Select to make this nav sticky, but only on a single width.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_clickable']           = array('Clickable?', 'Check to make this nav clickable as opposed to hover.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_includeLeft']         = array('Include left section.', 'Select to include a left nav section in this top bar.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_includeRight']        = array('Include right section.', 'Select to include a left nav section in this top bar.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_defineRootLeft']      = array('Define root page.', 'Select to define a root page for this left nav.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_defineRootRight']     = array('Define root page.', 'Select to define a root page for this right nav.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_rootPageLeft']        = array('Reference page.', 'Define a root page for this left nav.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_rootPageRight']       = array('Reference page.', 'Define a root page for this right nav.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_navigationTplLeft']   = array('Left menu nav template.', 'Select the template you would like to include on the left navigation.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_navigationTplRight']  = array('Right menu nav template.', 'Select the template you would like to include on the right navigation.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_levelOffsetLeft']     = array('Left start level', 'Enter a value greater than 0 to show only submenu items.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_levelOffsetRight']    = array('Right start level', 'Enter a value greater than 0 to show only submenu items.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_showLevelLeft']       = array('Left stop level', 'Enter a value greater than 0 to limit the nesting level of the menu.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_showLevelRight']      = array('Right stop level', 'Enter a value greater than 0 to limit the nesting level of the menu.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_hardLimitLeft']       = array('Left hard limit', 'Never show any menu items beyond the stop level.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_hardLimitRight']      = array('Right hard limit', 'Never show any menu items beyond the stop level.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_showProtectedLeft']   = array('Left show protected', 'Show items that are usually only visible to authenticated users.');
$GLOBALS['TL_LANG']['tl_module']['foundation_nav_showProtectedRight']  = array('Right show protected', 'Show items that are usually only visible to authenticated users.');
$GLOBALS['TL_LANG']['tl_module']['foundation_visibility']              = array('Foundation visibility', 'Check to change the visibility of this element at various size screen widths for responsive sites.');
$GLOBALS['TL_LANG']['tl_module']['foundation_visibility_show']         = array('Show element','Show element based on screen width sizing.');
$GLOBALS['TL_LANG']['tl_module']['foundation_visibility_hide']         = array('Hide element','Hide element based on screen width sizing.');
$GLOBALS['TL_LANG']['tl_module']['foundation_visibility_orientation']  = array('Show/hide orientation','Show/hide element based on screen orientation.');
$GLOBALS['TL_LANG']['tl_module']['foundation_visibility_touch']        = array('Show/hide touch','Show/hide element based on touch capabilities.');

$GLOBALS['TL_LANG']['tl_module']['foundation_grid']                    = array('Foundation grid', 'Check to change the grid settings of this element at various size screen widths for responsive sites. Foundation is based on a 12-column grid by default.');
$GLOBALS['TL_LANG']['tl_module']['foundation_grid_small']              = array('Small settings','Small screen width settings.');
$GLOBALS['TL_LANG']['tl_module']['foundation_grid_medium']             = array('Medium settings','Medium screen width settings.');
$GLOBALS['TL_LANG']['tl_module']['foundation_grid_large']              = array('Large settings','Large screen width settings.');
$GLOBALS['TL_LANG']['tl_module']['foundation_grid_xlarge']             = array('X-Large settings','X-Large screen width settings.');
$GLOBALS['TL_LANG']['tl_module']['foundation_grid_xxlarge']            = array('XX-Large settings','XX-Large screen width settings.');

$GLOBALS['TL_LANG']['tl_module']['foundation_block_grid']              = array('Foundation block grid', 'Check to change the block grid settings of this element at various size screen widths for responsive sites. Foundation is based on a 12-column grid by default.');
$GLOBALS['TL_LANG']['tl_module']['foundation_block_grid_settings']     = array('Block grid column settings', 'Check to change the block grid settings of this element at various size screen widths for responsive sites. Foundation is based on a 12-column grid by default.');

$GLOBALS['TL_LANG']['tl_module']['foundation_equalize']                = array('Equalize height', 'If this element is the child of a row, checking this will force the element to equalize its height with other elements in the row.');            
$GLOBALS['TL_LANG']['tl_module']['foundation_equalizer']               = array('Equalize height of child elements', 'Checking this will allow child elements to equalize their height with other elements in the row.');            
$GLOBALS['TL_LANG']['tl_module']['foundation_offcanvas_side']          = array('Show on', 'Select the side of the page that you would like this offcanvas element to show on.');
$GLOBALS['TL_LANG']['tl_module']['foundation_tabbar_title']            = array('Menu title', 'Select the menu title of the tab bar that will trigger the offcanvas element.');
$GLOBALS['TL_LANG']['tl_module']['foundation_tabbar_title_side']       = array('Menu title side', 'Select the side to show the menu title of the tab bar that will trigger the offcanvas element.');
$GLOBALS['TL_LANG']['tl_module']['foundation_modules']                 = array('Modules', 'Select the module for this foundation element.');
$GLOBALS['TL_LANG']['tl_module']['foundation_button']                  = array('Button label','Modal dialog button label.');
$GLOBALS['TL_LANG']['tl_module']['foundation_incarticle']              = array('Include article','Include article in Reveal Modal Window.');
$GLOBALS['TL_LANG']['tl_module']['foundation_incmodule']               = array('Include module','Include module in Reveal Modal Window.');
 
/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_module']['columns']             = 'Columns';
$GLOBALS['TL_LANG']['tl_module']['offset']              = 'Offset';
$GLOBALS['TL_LANG']['tl_module']['push']                = 'Push';
$GLOBALS['TL_LANG']['tl_module']['pull']                = 'Pull';
$GLOBALS['TL_LANG']['tl_module']['centering']           = 'Centering';
$GLOBALS['TL_LANG']['tl_module']['end']                 = 'End';
$GLOBALS['TL_LANG']['tl_module']['small']               = 'Small cols';
$GLOBALS['TL_LANG']['tl_module']['medium']              = 'Medium cols';
$GLOBALS['TL_LANG']['tl_module']['large']               = 'Large cols';
$GLOBALS['TL_LANG']['tl_module']['xlarge']              = 'X-Large cols';
$GLOBALS['TL_LANG']['tl_module']['xxlarge']             = 'XX-Large cols';
$GLOBALS['TL_LANG']['tl_module']['foundation']['start'] = 'Start';
$GLOBALS['TL_LANG']['tl_module']['foundation']['stop']  = 'End';
  
/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_module']['link_legend'] = 'Hyperlink settings';
$GLOBALS['TL_LANG']['tl_module']['imglink_legend'] = 'Image link settings';
$GLOBALS['TL_LANG']['tl_module']['foundationconfig_legend'] = 'Foundation configuration';
$GLOBALS['TL_LANG']['tl_module']['foundation_legend'] = 'Foundation responsive settings';
$GLOBALS['TL_LANG']['tl_module']['foundationleft_legend'] = 'Top Bar left section configuration';
$GLOBALS['TL_LANG']['tl_module']['foundationright_legend'] = 'Top Bar right section configuration';