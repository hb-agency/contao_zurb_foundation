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

\System::loadLanguageFile('foundation');

/**
 * Basic Palettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'foundation_visibility';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'foundation_grid';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'foundation_block_grid';

/**
 * Loop through all Content Elements and add Foundation to end of palette
 */
foreach($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $element => $strPalette) 
{
    if(!is_array($GLOBALS['TL_DCA']['tl_form_field']['palettes'][$element]))
    {
        $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$element] .= ';{foundation_legend:hide},foundation_visibility,foundation_grid,foundation_block_grid,foundation_equalize;';
    }
}

/**
 * CE Palettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['foundation_rowstart'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{foundation_legend:hide},foundation_visibility,foundation_block_grid,foundation_equalizer;';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['foundation_rowstop'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['foundation_genericstart'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{foundation_legend:hide},foundation_visibility,foundation_grid,foundation_block_grid,foundation_equalize;';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['foundation_genericstop'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['foundation_visibility'] = 'foundation_visibility_show,foundation_visibility_hide,foundation_visibility_orientation,foundation_visibility_touch';
$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['foundation_grid'] = 'foundation_grid_small,foundation_grid_medium,foundation_grid_large';
$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['foundation_block_grid'] = 'foundation_block_grid_settings';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_equalizer'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_equalizer'],
	'exclude'       	      => true,
	'inputType'     	      => 'checkbox',
	'eval'                    => array('tl_class'=> 'w50'),
	'sql'                     => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_equalize'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_equalize'],
	'exclude'       	      => true,
	'inputType'     	      => 'checkbox',
	'eval'                    => array('tl_class'=> 'w50'),
	'sql'                     => "char(1) NOT NULL default ''",
);

/**
 * Selector Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_visibility'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_visibility'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_grid'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_grid'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_block_grid'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_block_grid'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_equalize'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_equalize'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

/**
* Subpalette Fields
*/
$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_visibility_show'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_visibility_show'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['SHOW'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_visibility_hide'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_visibility_hide'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['HIDE'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_visibility_orientation'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_visibility_orientation'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['ORIENTATION'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_visibility_touch'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_visibility_touch'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['TOUCH'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_grid_small'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_grid_small'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_grid_medium'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_grid_medium'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_grid_large'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_grid_large'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['foundation_block_grid_settings'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['foundation_block_grid_settings'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'small'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['small'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'medium'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['medium'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'large'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_form_field']['large'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
		)
	),
    
);

