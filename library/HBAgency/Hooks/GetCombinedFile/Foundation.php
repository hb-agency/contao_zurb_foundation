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
 * Run in a custom namespace, so the class can be replaced
 */
namespace HBAgency\Hooks\GetCombinedFile;



/**
 * Class FoundationGetCombinedFile 
 *
 * Runs hook for \Contao\Combiner\getCombinedFile
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class Foundation extends \Controller
{

	/**
	 * Modify the file content - compress Foundation scripts with YUI or JShrink
	 * @param string
	 * @param string
	 * @param string
	 * @param array
	 * @return string
	 */
	public function run($content, $strKey, $strMode, $arrFile)
	{
		if(in_array($arrFile['name'], $GLOBALS['FOUNDATION_JS']) && !\Config::get('debugMode'))
		{
			try 
			{
				//Try YUI
				$yui = new \YUI\Compressor();
				$yui->setType(\YUI\Compressor::TYPE_JS);
				$content = $yui->compress($content);
			}
			catch (\Exception $e)
			{
				//Fall back to JShrink if Java not available
				$content = \JShrink\Minifier::minify($content);
			}
		}
		
		return $content;
	}
	
}