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
 
\Controller::loadDataContainer('tl_content');
\System::loadLanguageFile('foundation');
\System::loadLanguageFile('tl_content');

/**
 * Selector Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_visibility';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_grid';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_block_grid';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_nav_sticky';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_nav_includeLeft';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_nav_includeRight';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_nav_defineRootLeft';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_nav_defineRootRight';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_incmodule';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'foundation_incarticle';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'useImage';

/**
 * Palettes
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['foundationnav_topbar'] = '{title_legend},name,headline,type;{foundationconfig_legend},foundation_nav_title,foundation_nav_menuicon,foundation_nav_fixed,foundation_nav_containtogrid,foundation_nav_clickable,foundation_nav_sticky;{foundationleft_legend},foundation_nav_includeLeft;{foundationright_legend},foundation_nav_includeRight;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['foundation_offcanvas'] = '{title_legend},name,headline,type;{foundationconfig_legend},foundation_offcanvas_side,foundation_modules;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['foundation_tabbar'] = '{title_legend},name,type;{foundationconfig_legend},foundation_tabbar_title,foundation_tabbar_title_side;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['foundation_iconbar'] = '{title_legend},name,type;{foundationconfig_legend},foundation_icons;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Loop through all modules and add Foundation to end of palette
 */
foreach($GLOBALS['TL_DCA']['tl_module']['palettes'] as $element => $strPalette) 
{
    if(!is_array($GLOBALS['TL_DCA']['tl_module']['palettes'][$element]))
    {
        $GLOBALS['TL_DCA']['tl_module']['palettes'][$element] .= ';{foundation_legend:hide},foundation_visibility;';
    }
}

/**
 * Don't loop in this modules
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['foundation_revealmodalwindow'] = '{title_legend},name,headline,type,foundation_button;{link_legend},url,target,linkTitle,embed,titleText;{imglink_legend:hide},useImage;{include_legend},foundation_incarticle,foundation_incmodule;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop;{foundation_legend:hide},foundation_visibility,foundation_grid,foundation_block_grid,foundation_equalize;';

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_visibility'] = 'foundation_visibility_show,foundation_visibility_hide,foundation_visibility_orientation,foundation_visibility_touch';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_grid'] = 'foundation_grid_small,foundation_grid_medium,foundation_grid_large,foundation_grid_xlarge,foundation_grid_xxlarge';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_block_grid'] = 'foundation_block_grid_settings';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_nav_sticky'] = 'foundation_nav_sticky_on';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_nav_includeLeft'] = 'foundation_nav_levelOffsetLeft,foundation_nav_showLevelLeft,foundation_nav_hardLimitLeft,foundation_nav_showProtectedLeft,foundation_nav_defineRootLeft,foundation_nav_navigationTplLeft';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_nav_includeRight'] = 'foundation_nav_levelOffsetRight,foundation_nav_showLevelRight,foundation_nav_hardLimitRight,foundation_nav_showProtectedRight,foundation_nav_defineRootRight,foundation_nav_navigationTplRight';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_nav_defineRootLeft'] = 'foundation_nav_rootPageLeft';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_nav_defineRootRight'] = 'foundation_nav_rootPageRight';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_incarticle'] = 'cteAlias';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['foundation_incmodule'] = 'foundation_modules';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['useImage'] = 'singleSRC,alt,title,size,caption';

/**
 * Selector Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['useImage'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['useImage'],
		'exclude'       	      => true,
		'inputType'     	      => 'checkbox',
		'eval'                    => array('submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_incmodule'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_incmodule'],
		'exclude'       	      => true,
		'inputType'     	      => 'checkbox',
		'eval'                    => array('submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_incarticle'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_incarticle'],
		'exclude'       	      => true,
		'inputType'     	      => 'checkbox',
		'eval'                    => array('submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_visibility'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_visibility'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_grid'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_grid'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_block_grid'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_block_grid'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_equalize'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_equalize'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_sticky'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_sticky'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_includeLeft'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_includeLeft'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_defineRootLeft'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_defineRootLeft'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_includeRight'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_includeRight'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_defineRootRight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_defineRootRight'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['caption'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['caption'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'allowHtml'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['title'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['title'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['alt'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['alt'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['target'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['MSC']['target'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'w50 m12'),
		'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['url'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['MSC']['url'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['linkTitle'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkTitle'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['embed'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['embed'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['titleText'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['titleText'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_button'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_button'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
); 

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_offcanvas_side'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_offcanvas_side'],
    'exclude'                 => true,
    'default'                 => 'left',
    'inputType'               => 'select',
	'options'                 => array('left','right'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_tabbar_title'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_tabbar_title'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_tabbar_title_side'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_tabbar_title_side'],
    'exclude'                 => true,
    'default'                 => 'left',
    'inputType'               => 'select',
	'options'                 => array('left','right'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_title'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_title'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_menuicon'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_menuicon'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_fixed'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_fixed'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_containtogrid'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_containtogrid'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_sticky_on'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_sticky_on'],
    'exclude'                 => true,
    'inputType'               => 'select',
	'options'                 => array('small','medium','large'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('insertBlankOption'=> true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_clickable'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_clickable'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);
	
$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_rootPageLeft'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_rootPageLeft'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'foreignKey'              => 'tl_page.title',
	'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr'),
	'sql'                     => "int(10) unsigned NOT NULL default '0'",
	'relation'                => array('type'=>'hasOne', 'load'=>'lazy')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_navigationTplLeft'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_navigationTplLeft'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module', 'getNavigationTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_levelOffsetLeft'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_levelOffsetLeft'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>5, 'rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_showLevelLeft'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_showLevelLeft'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>5, 'rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_hardLimitLeft'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_hardLimitLeft'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_showProtectedLeft'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_showProtectedLeft'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_rootPageRight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_rootPageRight'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'foreignKey'              => 'tl_page.title',
	'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr'),
	'sql'                     => "int(10) unsigned NOT NULL default '0'",
	'relation'                => array('type'=>'hasOne', 'load'=>'lazy')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_navigationTplRight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_navigationTplRight'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module', 'getNavigationTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_levelOffsetRight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_levelOffsetRight'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>5, 'rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_showLevelRight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_showLevelRight'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>5, 'rgxp'=>'digit', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_hardLimitRight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_hardLimitRight'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_nav_showProtectedRight'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_nav_showProtectedRight'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

/**
* Subpalette Fields
*/			
			
$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_visibility_show'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_visibility_show'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['SHOW'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_visibility_hide'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_visibility_hide'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['HIDE'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_visibility_orientation'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_visibility_orientation'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['ORIENTATION'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_visibility_touch'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['foundation_visibility_touch'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['TOUCH'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_grid_small'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['foundation_grid_small'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_grid_medium'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['foundation_grid_medium'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_grid_large'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['foundation_grid_large'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_grid_xlarge'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['foundation_grid_xlarge'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_grid_xxlarge'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['foundation_grid_xxlarge'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_block_grid_settings'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['foundation_block_grid_settings'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'small'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['small'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'medium'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['medium'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'large'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['large'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'xlarge'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['xlarge'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'xxlarge'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['xxlarge'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_modules'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['foundation_modules'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'eval'			=> array(
	    'tl_class'      => 'zf_container clr',
		'columnFields'	=> array(
			'module'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['module'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options_callback'	=> array('\Rhyme\Backend\FoundationModule','getAllModules'),
				'eval'              => array('chosen' => true, 'tl_class'=>'zf_module')
			)
		)
	),
    'sql'               => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['foundation_icons'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['foundation_icons'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'eval'			=> array(
	    'tl_class'      => 'zf_container clr',
		'columnFields'	=> array(
			'iconfile'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['iconfile'],
				'inputType'     	=> 'fileTree',
				'eval'              => array('filesOnly'=>true, 'fieldType'=>'radio', 'tl_class'=>'zf_filepicker')
			),
			'iconclass'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['iconclass'],
				'inputType'     	=> 'select',
				'options'           => &$GLOBALS['TL_LANG']['FOUNDATION']['ICONS'],
				'eval'              => array('includeBlankOption'=> true, 'tl_class'=>'zf_iconclass', 'chosen'=> false)
			),
			'iconclass_custom'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['iconclass_custom'],
				'inputType'     	=> 'text',
				'eval'              => array('tl_class'=>'zf_smalltext')
			),
			'icon_label'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['icon_label'],
				'inputType'     	=> 'text',
				'eval'              => array('tl_class'=>'zf_smalltext', 'maxlength'=>12)
			),
			'icon_href'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['icon_href'],
				'inputType'     	=> 'text',
				'eval'              => array('tl_class'=>'zf_smalltext', 'rgxp'=>'url', 'decodeEntities'=>true, 'mandatory'=>true),
				'wizard' => array
    			(
    				array('tl_content', 'pagePicker')
    			),
			),
		)
	),
    'sql'               => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['cteAlias'] = array
(
		'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['cteAlias'],
		'exclude'       => true,
		'inputType'     => 'multiColumnWizard',
		'eval'			=> array(
				'tl_class'      => 'zf_container clr',
				'columnFields'	=> array(
						'article'	=> array
						(
								'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['article'],
								'exclude'       	=> true,
								'inputType'     	=> 'select',
								'options_callback'	=> array('\Rhyme\Backend\FoundationModule','getAllArticles'),
								'eval'              => array('chosen' => true, 'tl_class'=>'zf_module')
						)
				)
		),
		'sql'               => "blob NULL"
);

/**
 * Additional image size options
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['size']['inputType']	= 'imageSize';
$GLOBALS['TL_DCA']['tl_module']['fields']['size']['options']	= $GLOBALS['TL_CROP'];
$GLOBALS['TL_DCA']['tl_module']['fields']['size']['reference']	= &$GLOBALS['TL_LANG']['MSC'];
$GLOBALS['TL_DCA']['tl_module']['fields']['size']['eval']		= array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50');
$GLOBALS['TL_DCA']['tl_module']['fields']['size']['label']		= &$GLOBALS['TL_LANG']['tl_content']['size'];
