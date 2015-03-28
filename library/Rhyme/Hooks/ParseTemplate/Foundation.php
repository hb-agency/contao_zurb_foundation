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
namespace Rhyme\Hooks\ParseTemplate;



/**
 * Class FoundationParseTemplate 
 *
 * Runs hook for \Contao\Template\parseTemplate
 * @copyright  2015 Rhyme Digital
 * @author     Blair Winans <blair@rhyme.digital>
 * @package    Zurb_Foundation
 */
class Foundation extends \Controller
{
	/**
	 * Parse the template
	 * @param Template
	 * @return Template
	 */
	public function run(&$objTemplate)
	{
		if(TL_MODE == 'FE')
		{
		    // get the Data of the Template Object
            $arrData = $objTemplate->getData();
            
            //Add foundation classes
		    $strClasses = $this->getFoundationClasses($arrData);
		    if(!empty($strClasses))
		    {
                $objTemplate->class .= (!empty($objTemplate->class) ? ' ' : '') . $strClasses;
            }
            //Add equalize data attributes
            $strEqualize = $this->getEqualizeAttributes($arrData);
            if(!empty($strEqualize))
            {
                $objTemplate->cssID .= " $strEqualize";
            }
            
            //Check whether we have orbit slides
            $objTemplate->isOrbitSlide = $this->checkForOrbitSlides($objTemplate);
        }
        
		return $objTemplate;
	}
	
	/**
	 * Add foundation classes
	 * @param array
	 * @return string
	 */
	protected function getFoundationClasses($arrData)
	{
	    $arrFoundationClasses = array_merge($this->getVisibilityClasses($arrData),
	                                        $this->getBlockGridClasses($arrData),
	                                        $this->getGridClasses($arrData));
	    
	    return implode(' ', $arrFoundationClasses);
	}
	
	/**
	 * Add foundation classes
	 * @param array
	 * @return string
	 */
	protected function getEqualizeAttributes($arrData)
	{
	    $arrEqualizeAttributes = array();
	    
	    if(!empty($arrData['foundation_equalizer'])) {
    	    $arrEqualizeAttributes[] = 'data-equalizer';
	    }
	    if(!empty($arrData['foundation_equalize'])) {
    	    $arrEqualizeAttributes[] = 'data-equalizer-watch';
	    }
	    
	    return implode(' ', $arrEqualizeAttributes);
	}
	
	/**
	 * Add visibility settings
	 * @param array
	 * @return array
	 */
	protected function getVisibilityClasses($arrData)
	{
	    $arrVisibilityClasses = array();
	    
	    //Parse Foundation Visibility Class
		if($arrData['foundation_visibility'])
		{
		    if(!empty($arrData['foundation_visibility_show'])){
    		  $arrVisibilityClasses[] = $arrData['foundation_visibility_show'];
		    }
		    if(!empty($arrData['foundation_visibility_hide'])){
    		  $arrVisibilityClasses[] = $arrData['foundation_visibility_hide'];
		    }
		    if(!empty($arrData['foundation_visibility_orientation'])){
    		  $arrVisibilityClasses[] = $arrData['foundation_visibility_orientation'];
		    }
		    if(!empty($arrData['foundation_visibility_touch'])){
    		  $arrVisibilityClasses[] = $arrData['foundation_visibility_touch'];
		    }
		}
        
        return $arrVisibilityClasses;
	}
	
	/**
	 * Add block grid class settings
	 * @param array
	 * @return string
	 */
	protected function getBlockGridClasses($arrData)
	{
	    $arrBlockGridClasses = array();
	    
	    if($arrData['foundation_block_grid'])
		{
    		$arrBlockSettings = deserialize($arrData['foundation_block_grid_settings']);
    				
    		//Block grid settings
    		foreach($arrBlockSettings[0] as $size => $intCols)
    		{
        		if(!empty($intCols)) {
            		$arrBlockGridClasses[] = $size . '-block-grid-' . $intCols;
        		}
    		}
        }
		
		return $arrBlockGridClasses;
	}
	
	/**
	 * Add grid class settings
	 * @param array
	 * @return string
	 */
	protected function getGridClasses($arrData)
	{
	    $arrGridClasses = array();
	    
	    if($arrData['foundation_grid'])
		{
    		$arrSmallSettings = deserialize($arrData['foundation_grid_small']);
    		$arrMediumSettings = deserialize($arrData['foundation_grid_medium']);
    		$arrLargeSettings = deserialize($arrData['foundation_grid_large']);
    		$arrXLargeSettings = deserialize($arrData['foundation_grid_xlarge']);
    		$arrXXLargeSettings = deserialize($arrData['foundation_grid_xxlarge']);
    				
    		//Small settings
    		$arrGridClasses = array_merge($this->parseGridSettings('small', $arrSmallSettings[0]), 
    		                              $this->parseGridSettings('medium', $arrMediumSettings[0]),
    		                              $this->parseGridSettings('large', $arrLargeSettings[0]),
    		                              $this->parseGridSettings('xlarge', $arrXLargeSettings[0]),
    		                              $this->parseGridSettings('xxlarge', $arrXXLargeSettings[0]));
        
        }
        
		return array_unique($arrGridClasses);
	}
	
	/**
	 * Parse grid class settings - Parse Foundation Columns/Offset/Push/Pull/End
	 * @param string
	 * @param array
	 * @return string
	 */
    protected function parseGridSettings($strSize='small', $arrSettings=array())
    {
        $arrParsedGridClasses = array();
        
        if(!empty($arrSettings['columns'])) {
            $arrParsedGridClasses[] = $strSize . '-' . $arrSettings['columns'];
            $arrParsedGridClasses[] = 'column';
        }
        if(!empty($arrSettings['offset'])) {
            $arrParsedGridClasses[] = $strSize . '-offset-' . $arrSettings['offset'];
        }
        if(!empty($arrSettings['push'])) {
            $arrParsedGridClasses[] = $strSize . '-push-' . $arrSettings['push'];
        }
        if(!empty($arrSettings['pull'])) {
            $arrParsedGridClasses[] = $strSize . '-pull-' . $arrSettings['pull'];
        }
        if(!empty($arrSettings['centering'])) {
            $arrParsedGridClasses[] = $strSize . '-' . $arrSettings['centering'];
        }
        if(!empty($arrSettings['end'])) {
            $arrParsedGridClasses[] = 'end';
        }
        
        return $arrParsedGridClasses;
    }
    
    /**
	 * Check if this template should be designated as an Orbit Slide
	 * @param Contao\Template
	 * @return boolean
	 */
	protected function checkForOrbitSlides($objTemplate)
    {
    	$blnIsOrbitSlide = false;
    	
    	//Check for content element
    	if(substr($objTemplate->getName(), 0, 3) == 'ce_')
    	{
	    	$arrCheck = \Database::getInstance()->prepare("SELECT sorting, type FROM tl_content
	    												   WHERE pid=? AND ptable=?
	    												   AND (type='foundation_orbitstart' 
	    												   OR type='foundation_orbitstop')
	    												   ORDER BY sorting ASC")
	    												   ->execute($objTemplate->pid, $objTemplate->ptable)
	    												   ->fetchAllAssoc();
	    												   
	    	if(!empty($arrCheck))
	    	{
	    		for($i=0; $i < count($arrCheck); $i++)
	    		{
	    			$intNext = $i < count($arrCheck) ? $i+1 : $i;
		    		if( $arrCheck[$i]['type']=='foundation_orbitstart' && 
		    			$arrCheck[$intNext]['type']=='foundation_orbitstop' &&
		    			$arrCheck[$i]['sorting'] < $objTemplate->sorting &&
		    			$arrCheck[$intNext]['sorting'] > $objTemplate->sorting )
		    		{
			    		$blnIsOrbitSlide = true;
		    		}
	    		}
	    	}
    	}
    	
    	return $blnIsOrbitSlide;
    }

    
}
