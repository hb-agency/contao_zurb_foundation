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

\System::loadLanguageFile('foundation');

/**
 * Basic Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'foundation_visibility';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'foundation_grid';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'foundation_block_grid';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'foundation_incarticle';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'foundation_incmodule';

/**
 * Loop through all Content Elements and add Foundation to end of palette
 */
foreach($GLOBALS['TL_DCA']['tl_content']['palettes'] as $element => $strPalette) 
{
    if(!is_array($GLOBALS['TL_DCA']['tl_content']['palettes'][$element]))
    {
        $GLOBALS['TL_DCA']['tl_content']['palettes'][$element] .= ';{foundation_legend:hide},foundation_visibility,foundation_grid,foundation_block_grid,foundation_equalize;';
    }
}

/**
 * CE Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_sidenav'] = '{type_legend},type,headline;{foundation_legend},foundation_pages;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_rowstart'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{foundation_legend:hide},foundation_visibility,foundation_block_grid,foundation_equalizer;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_rowstop'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_genericstart'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{foundation_legend:hide},foundation_visibility,foundation_grid,foundation_block_grid,foundation_equalize;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_genericstop'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_orbitstart'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{foundation_legend:hide},foundation_visibility,foundation_grid,foundation_block_grid,foundation_equalize;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_orbitstop'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_flexvideo'] = '{type_legend},type,headline;{source_legend},foundation_flexvideo;{player_legend},playerSize;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_interchangesingle'] = '{type_legend},type,headline;{source_legend},singleSRC;{size_legend},size,foundation_size_small,foundation_size_medium,foundation_size_large;{image_legend},alt,title,imagemargin,imageUrl,fullsize,caption;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_revealmodalwindow'] = '{type_legend},type,headline;{link_legend},linkTitle,embed,titleText;{imglink_legend:hide},useImage;{include_legend},foundation_incarticle,foundation_incmodule;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop;{foundation_legend:hide},foundation_visibility,foundation_grid,foundation_block_grid,foundation_equalize;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['foundation_tabs'] = '{type_legend},type,headline;{tabs_content},foundation_tabs_direction,foundation_tabs_content;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop;{foundation_legend:hide},foundation_visibility,foundation_grid,foundation_block_grid,foundation_equalize;';

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['foundation_visibility'] = 'foundation_visibility_show,foundation_visibility_hide,foundation_visibility_orientation,foundation_visibility_touch';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['foundation_grid'] = 'foundation_grid_small,foundation_grid_medium,foundation_grid_large';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['foundation_block_grid'] = 'foundation_block_grid_settings';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['foundation_incarticle'] = 'foundation_article';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['foundation_incmodule'] = 'foundation_modules';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_tabs_direction'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_tabs_direction'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'select',
        'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['TABS']['DIRECTION'],
		'eval'                    => array('tl_class'=>'w50','includeBlankOption' => false),
        'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
		'sql'                     => "varchar(32) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_tabs_content'] = array
(
		'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['foundation_tabs_content'],
		'exclude'       => false,
		'inputType'     => 'multiColumnWizard',
		'save_callback' => array('\HBAgency\Backend\FoundationContent', 'setTabTitle'),
		'eval'			=> array
		(
				'tl_class'      => 'zf_container clr',
				'columnFields'	=> array
				(
						'article'	=> array
						(
								'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['article'],
								'exclude'       	=> true,
								'inputType'     	=> 'select',
								'options_callback'	=> array('\HBAgency\Backend\FoundationContent','getArticles'),
								'eval'              => array('chosen' => true, 'tl_class'=>'zf_article'),
						),
						'title'     => array
                        (
                                'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['tabtitle'],
								'exclude'       	=> true,
								'inputType'     	=> 'text',
								'eval'              => array('tl_class'=>'zf_tabtitle'),
                        ),
				),
		),
		'sql'               => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_incmodule'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_incmodule'],
		'exclude'       	      => true,
		'inputType'     	      => 'checkbox',
		'eval'                    => array('submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_incarticle'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_incarticle'],
		'exclude'       	      => true,
		'inputType'     	      => 'checkbox',
		'eval'                    => array('submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''",
);
 
$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_flexvideo'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_flexvideo'],
	'exclude'       	      => true,
	'inputType'     	      => 'text',
	'eval'                    => array('rgxp' => 'url', 'tl_class'=> 'clr long'),
	'sql'                     => "varchar(255) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_equalizer'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_equalizer'],
	'exclude'       	      => true,
	'inputType'     	      => 'checkbox',
	'eval'                    => array('tl_class'=> 'w50'),
	'sql'                     => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_equalize'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_equalize'],
	'exclude'       	      => true,
	'inputType'     	      => 'checkbox',
	'eval'                    => array('tl_class'=> 'w50'),
	'sql'                     => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_size_small'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_size_small'],
	'exclude'                 => true,
	'inputType'               => 'imageSize',
	'options'                 => $GLOBALS['TL_CROP'],
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_size_medium'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_size_medium'],
	'exclude'                 => true,
	'inputType'               => 'imageSize',
	'options'                 => $GLOBALS['TL_CROP'],
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_size_large'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_size_large'],
	'exclude'                 => true,
	'inputType'               => 'imageSize',
	'options'                 => $GLOBALS['TL_CROP'],
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

/**
 * Selector Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_visibility'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_visibility'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_grid'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_grid'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_block_grid'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_block_grid'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_equalize'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_equalize'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

/**
* Subpalette Fields
*/
$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_visibility_show'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_visibility_show'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['SHOW'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_visibility_hide'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_visibility_hide'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['HIDE'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_visibility_orientation'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_visibility_orientation'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['ORIENTATION'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_visibility_touch'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_visibility_touch'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['TL_LANG']['FOUNDATION']['CSS']['VISIBILITY']['TOUCH'],
	'eval'                    => array('tl_class'=>'w25','includeBlankOption' => true),
	'reference'               => &$GLOBALS['TL_LANG']['MSC']['FOUNDATION'],
	'sql'                     => "varchar(32) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_grid_small'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_content']['foundation_grid_small'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_grid_medium'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_content']['foundation_grid_medium'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_grid_large'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_content']['foundation_grid_large'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'columns'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['columns'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'offset'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['offset'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'push'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['push'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'pull'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['pull'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'centering'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['centering'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('centered','uncentered'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20')
			),
			'end'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['end'],
				'exclude'       	=> true,
				'inputType'     	=> 'checkbox',
				'eval'              => array('tl_class'=> 'w20')
			),
		)
	),
    
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_block_grid_settings'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_content']['foundation_block_grid_settings'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'sql'           => "blob NULL",
	'eval'			=> array(
	    'tl_class'      => 'foundation_settings',
	    'hideButtons'   => true,
		'columnFields'	=> array(
			'small'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['small'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'medium'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['medium'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
			'large'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['large'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options'	        => array('1','2','3','4','5','6','7','8','9','10','11','12'),
				'eval'              => array('includeBlankOption' => true, 'tl_class'=> 'w20 tl_select_small')
			),
		)
	),
    
);


$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_pages'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['foundation_pages'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'foreignKey'              => 'tl_page.title',
	'eval'                    => array('multiple'=>true, 'fieldType'=>'checkbox', 'files'=>true, 'orderField'=>'orderPages', 'mandatory'=>true),
	'sql'                     => "blob NULL",
	'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['orderPages'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['orderSRC'],
	'sql'                     => "blob NULL"
);


/**
 * Additional include options for multi options
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_article'] = array
(
		'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['foundation_article'],
		'exclude'       => false,
		'inputType'     => 'multiColumnWizard',
		'eval'			=> array
		(
				'tl_class'      => 'zf_container clr',
				'columnFields'	=> array
				(
						'article'	=> array
						(
								'label'         	=> &$GLOBALS['TL_LANG']['tl_content']['article'],
								'exclude'       	=> true,
								'inputType'     	=> 'select',
								'options_callback'	=> array('\HBAgency\Backend\FoundationContent','getArticles'),
								'eval'              => array('chosen' => true, 'tl_class'=>'zf_article')
						)
				)
		),
		'sql'           => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['foundation_modules'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_content']['foundation_modules'],
	'exclude'       => true,
	'inputType'     => 'multiColumnWizard',
	'eval'			=> array
	(
	    'tl_class'      => 'zf_container clr',
		'columnFields'	=> array(
			'module'	=> array
			(
				'label'         	=> &$GLOBALS['TL_LANG']['tl_module']['module'],
				'exclude'       	=> true,
				'inputType'     	=> 'select',
				'options_callback'  => array('tl_content', 'getModules'),
				'eval'              => array('chosen' => true, 'tl_class'=>'zf_module')
			)
		)
	),
    'sql'               => "blob NULL"
);
