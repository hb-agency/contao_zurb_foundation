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
 
 namespace Rhyme\FormField;
 
 use Contao\Widget as Contao_Widget;
 
 /**
 * Class Foundation 
 *
 * Base class for Foundation FormFields
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
 * @package    Zurb_Foundation
 */
abstract class Foundation extends Contao_Widget
{
    
    /**
	 * Do not validate
	 */
	public function validate()
	{
		return;
	}
	
	/**
	 * Send back Foundation data because the Widget Class does not return it by default!
	 */
	public function getData()
	{
		$arrData = array
		(
		   'foundation_equalizer'               => $this->foundation_equalizer,
		   'foundation_equalize'                => $this->foundation_equalize,
		   'foundation_visibility'              => $this->foundation_visibility,
		   'foundation_grid'                    => $this->foundation_grid,
		   'foundation_block_grid'              => $this->foundation_block_grid,
		   'foundation_visibility_show'         => $this->foundation_visibility_show,
		   'foundation_visibility_hide'         => $this->foundation_visibility_hide,
		   'foundation_visibility_orientation'  => $this->foundation_visibility_orientation,
		   'foundation_visibility_touch'        => $this->foundation_visibility_touch,
		   'foundation_grid_small'              => $this->foundation_grid_small,
		   'foundation_grid_medium'             => $this->foundation_grid_medium,
		   'foundation_grid_large'              => $this->foundation_grid_large,
		   'foundation_block_grid_settings'     => $this->foundation_block_grid_settings,
		);
		
		return $arrData;
	}

}