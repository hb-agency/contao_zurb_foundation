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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_theme']['palettes']['default'] .= ';{foundation_legend:close},
															foundation_break_medium,
															foundation_break_large,
															foundation_break_xlarge,
															foundation_break_xxlarge;';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_theme']['fields']['foundation_break_medium'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_theme']['foundation_break_medium'],
	'inputType'               => 'inputUnit',
	'options'                 => array('px', 'em'),
	'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_normal_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_theme']['fields']['foundation_break_large'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_theme']['foundation_break_large'],
	'inputType'               => 'inputUnit',
	'options'                 => array('px', 'em'),
	'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_normal_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_theme']['fields']['foundation_break_xlarge'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_theme']['foundation_break_xlarge'],
	'inputType'               => 'inputUnit',
	'options'                 => array('px', 'em'),
	'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_normal_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_theme']['fields']['foundation_break_xxlarge'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_theme']['foundation_break_xxlarge'],
	'inputType'               => 'inputUnit',
	'options'                 => array('px', 'em'),
	'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_normal_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
