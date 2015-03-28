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
 
 namespace Rhyme\ContentElement;
 
 use Contao\ContentElement as Contao_CE;
 
 /**
 * Class Foundation 
 *
 * Base class for Foundation ContentElements
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
 * @package    Zurb_Foundation
 */
abstract class Foundation extends Contao_CE
{

    /**
     * Initialize the content element
     * @param object
     */
    public function __construct($objElement)
    {
        parent::__construct($objElement);
    }


}