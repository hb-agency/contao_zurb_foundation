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
 
namespace HBAgency\Backend;
 
use Contao\Backend as Contao_BE;
 
 
/**
 * Class FoundationModule 
 *
 * Handles backend operations for tl_module
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class FoundationModule extends Contao_BE
{

    /**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}
	
	/**
	 * Return all left navigation templates as array
	 * @return array
	 */
	public function getLeftNavigationTemplates()
	{
		return $this->getTemplateGroup('navleft_');
	}
	
	/**
	 * Return all right navigation templates as array
	 * @return array
	 */
	public function getRightNavigationTemplates()
	{
		return $this->getTemplateGroup('navright_');
	}
	
	
	/* 
	 * Get the colsets depending on the selection from the settings
	 */
	public function getAllTypes()
	{
		$strSet = $GLOBALS['TL_CONFIG']['subcolumns'] ? $GLOBALS['TL_CONFIG']['subcolumns'] : 'yaml3';
		
		return array_keys($GLOBALS['TL_SUBCL'][$strSet]['sets']);
	}
	
	/* 
	 * Get all modules included in the same theme
	 */
	public function getAllModules()
	{
		$arrModules = array();
		$objModules = $this->Database->prepare("SELECT id, name FROM tl_module WHERE pid=(SELECT pid FROM tl_module WHERE id=?) AND id!=? ORDER BY name")->execute($this->Input->get('id'),$this->Input->get('id'));

		while ($objModules->next())
		{
			$arrModules[$objModules->id] = $objModules->name . ' (ID ' . $objModules->id . ')';
		}

		return $arrModules;
		
	}
	
	/* 
	 * Get possible columns
	 */
	public function getColumns($dc)
	{
		$objTypes = $this->Database->prepare("SELECT sc_type FROM tl_module WHERE id=?")->execute($this->Input->get('id'));
		
		$cols = array();
		$count = count(explode('x',$objTypes->sc_type));

		switch ($count)
		{
			case '2':
				$cols['first'] = $GLOBALS['TL_LANG']['MSC']['sc_first'];
				$cols['second'] = $GLOBALS['TL_LANG']['MSC']['sc_second'];
				break;

			case '3':
				$cols['first'] = $GLOBALS['TL_LANG']['MSC']['sc_first'];
				$cols['second'] = $GLOBALS['TL_LANG']['MSC']['sc_second'];
				$cols['third'] = $GLOBALS['TL_LANG']['MSC']['sc_third'];
				break;

			case '4':
				$cols['first'] = $GLOBALS['TL_LANG']['MSC']['sc_first'];
				$cols['second'] = $GLOBALS['TL_LANG']['MSC']['sc_second'];
				$cols['third'] = $GLOBALS['TL_LANG']['MSC']['sc_third'];
				$cols['fourth'] = $GLOBALS['TL_LANG']['MSC']['sc_fourth'];
				break;
			
			case '5':
				$cols['first'] = $GLOBALS['TL_LANG']['MSC']['sc_first'];
				$cols['second'] = $GLOBALS['TL_LANG']['MSC']['sc_second'];
				$cols['third'] = $GLOBALS['TL_LANG']['MSC']['sc_third'];
				$cols['fourth'] = $GLOBALS['TL_LANG']['MSC']['sc_fourth'];
				$cols['fifth'] = $GLOBALS['TL_LANG']['MSC']['sc_fifth'];
				break;
		}
		
		return $cols;
	}


}