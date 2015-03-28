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
 * Run in a custom namespace, so the class can be replaced
 */
namespace Rhyme\Hooks\GetCombinedFile;



/**
 * Class FoundationGetCombinedFile 
 *
 * Runs hook for \Contao\Combiner\getCombinedFile
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
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