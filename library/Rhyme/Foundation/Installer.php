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

use Rhyme\Foundation\Installer\Initializer;
 
/**
 * Class Installer
 *
 * Handles installing and upgrading the extension
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
 * @package    Zurb_Foundation
 */
class Installer extends \Controller
{
	
	/**
     * Run routines on install and/or upgrade
     * @return void
     */
    public static function install()
    {
    	Initializer::run();
    }

}