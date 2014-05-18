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
 
namespace HBAgency\Foundation;

use HBAgency\Foundation\Installer\Initializer;
 
/**
 * Class Installer
 *
 * Handles installing and upgrading the extension
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
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