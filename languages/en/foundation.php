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
 
 
$GLOBALS['TL_LANG']['FOUNDATION'] = array
(
    'SCSS' => array
	(
		'BREAKPOINT' => array
		(
			'small'		=> array('0em', '40em'),
			'medium'	=> array('40.063em', '64em'),
			'large'		=> array('64.063em', '90em'),
			'xlarge'	=> array('90.063em', '120em'),
			'xxlarge'	=> array('120.063em', '99999999em'),
		),
	),
    /**
     * CSS Selector Categories
     */
    'CSS' => array
    (
        'VISIBILITY' => array
        (

            'SHOW'    => array
            (
                'show-for-small-up',
                'show-for-medium-up',
                'show-for-large-up',
                'show-for-xlarge-up',
                'show-for-xxlarge-up',
                'show-for-small-only',
                'show-for-medium-only',
                'show-for-large-only',
                'show-for-xlarge-only',
                'show-for-xxlarge-only',
            ),
            'HIDE'    => array
            (
                'hide-for-small-up',
                'hide-for-medium-up',
                'hide-for-large-up',
                'hide-for-xlarge-up',
                'hide-for-xxlarge-up',
                'hide-for-small-only',
                'hide-for-medium-only',
                'hide-for-large-only',
                'hide-for-xlarge-only',
                'hide-for-xxlarge-only',
            ),
            'ORIENTATION'    => array
            (
                'show-for-landscape',
                'show-for-portrait',
            ),
            'TOUCH'    => array
            (
                'show-for-touch',
                'hide-for-touch',
            ),
        ),
    ),
);