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
 
 
 //Purge the Foundation cache
 \HBAgency\Foundation\Automator::purgeFoundationCache();
 
 //Run the installer/upgrader
 \HBAgency\Foundation\Installer::install();
 