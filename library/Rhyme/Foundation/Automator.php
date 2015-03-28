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
 
namespace Rhyme\Foundation;
 
/**
 * Class Automator
 *
 * Handles purging cache folders
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
 * @package    Zurb_Foundation
 */
class Automator extends \System
{
	
	/**
	 * Make the constuctor public
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Purge the foundation CSS and SCSS cache
	 */
	public static function purgeFoundationCache()
	{
		// Purge the folder
		$objFolder = new \Folder('assets/foundation');
		$objFolder->purge();

		// Add a log entry
		\System::log('Purged the Foundation cache', __METHOD__, TL_CRON);
	}

}

