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
 * Class FoundationContent 
 *
 * Handles backend operations for tl_content
 * @copyright  2014 HB Agency
 * @author     Blair Winans <bwinans@hbagency.com>
 * @package    Zurb_Foundation
 */
class FoundationContent extends Contao_BE
{

    /**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		\System::loadLanguageFile('foundation');
		$this->import('BackendUser', 'User');
	}
	
	/**
	 * Generate Options for small columns
	 */
	public function getSmallColumnOptions()
	{
    	return static::getColumnOptions('small', 'columns');
	}
	
	/**
	 * Generate Options for medium columns
	 */
	public function getMediumColumnOptions()
	{
    	return static::getColumnOptions('medium', 'columns');
	}
	
	/**
	 * Generate Options for large columns
	 */
	public function getLargeColumnOptions()
	{
    	return static::getColumnOptions('large', 'columns');
	}
	
	/**
	 * Generate Options for small offset
	 */
	public function getSmallOffsetOptions()
	{
    	return static::getColumnOptions('small', 'offset');
	}
	
	/**
	 * Generate Options for medium offset
	 */
	public function getMediumOffsetOptions()
	{
    	return static::getColumnOptions('medium', 'offset');
	}
	
	/**
	 * Generate Options for large offset
	 */
	public function getLargeOffsetOptions()
	{
    	return static::getColumnOptions('large', 'offset');
	}
	
	/**
	 * Generate Options for small push
	 */
	public function getSmallPushOptions()
	{
    	return static::getColumnOptions('small', 'push');
	}
	
	/**
	 * Generate Options for medium push
	 */
	public function getMediumPushOptions()
	{
    	return static::getColumnOptions('medium', 'push');
	}
	
	/**
	 * Generate Options for large push
	 */
	public function getLargePushOptions()
	{
    	return static::getColumnOptions('large', 'push');
	}
	
	/**
	 * Generate Options for small pull
	 */
	public function getSmallPullOptions()
	{
    	return static::getColumnOptions('small', 'pull');
	}
	
	/**
	 * Generate Options for medium pull
	 */
	public function getMediumPullOptions()
	{
    	return static::getColumnOptions('medium', 'pull');
	}
	
	/**
	 * Generate Options for large pull
	 */
	public function getLargePullOptions()
	{
    	return static::getColumnOptions('large', 'pull');
	}
	
	
	/**
	 * Generate Options for columns, offset, push and pull
	 *
	 * @param string $strSize   The width size
	 * @param string $strType   The foundation type
	 * @param string $strSource The foundation source type
	 * @return array
	 */
    public static function getColumnOptions($strSize='small', $strType='columns', $strSource='GRID') 
    {
        $arrSizes = array();
        
        $varSizes = $GLOBALS['TL_LANG']['FOUNDATION'][strtoupper($strSource)][strtolower($strSize)][strtolower($strType)];   
        
        if(!empty($varSizes) && intVal($varSizes) > 0)
        {
            $strJoin = $strType=='columns' ? '' : '-' . $strType;
        
            for($i=1; $i<=$varSizes; $i++)
            {
                $arrSizes[($strSize . $strJoin . '-' . $i)] = sprintf($GLOBALS['TL_LANG']['MSC']['FOUNDATION'][$strType], $i);
            }
        }
        
        return $arrSizes;
    }
    
    /**
	 * Generate Tab Title
	 *
	 * @param string
	 * @param \Contao\Widget
	 * @return string
	 */
    public function setTabTitle($varValue, &$objWidget)
    {
        if(empty($varValue))
        {
           $varValue = $GLOBALS['TL_LANG']['MSC']['FOUNDATION']['tab']; 
        }
        
    	return $varValue;
    }
    
    /**
	 * Get all Articles
	 *
	 * @return array
	 */
    public function getArticles()
    {
        $arrPids = array();
		$arrArticle = array();
		$arrRoot = array();
		$intPid = \Input::get('id');

		// Limit pages to the website root
		$objArticle = $this->Database->prepare("SELECT pid FROM tl_article WHERE id=?")
									 ->limit(1)
									 ->execute($intPid);

		if ($objArticle->numRows)
		{
			$objPage = \PageModel::findWithDetails($objArticle->pid);
			$arrRoot = $this->Database->getChildRecords($objPage->rootId, 'tl_page');
			array_unshift($arrRoot, $objPage->rootId);
		}

		unset($objArticle);

		// Limit pages to the user's pagemounts
		if ($this->User->isAdmin)
		{
			$objArticle = $this->Database->execute("SELECT a.id, a.pid, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid" . (!empty($arrRoot) ? " WHERE a.pid IN(". implode(',', array_map('intval', array_unique($arrRoot))) .")" : "") . " ORDER BY parent, a.sorting");
		}
		else
		{
			foreach ($this->User->pagemounts as $id)
			{
				if (!in_array($id, $arrRoot))
				{
					continue;
				}

				$arrPids[] = $id;
				$arrPids = array_merge($arrPids, $this->Database->getChildRecords($id, 'tl_page'));
			}

			if (empty($arrPids))
			{
				return $arrArticle;
			}

			$objArticle = $this->Database->execute("SELECT a.id, a.pid, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid WHERE a.pid IN(". implode(',', array_map('intval', array_unique($arrPids))) .") ORDER BY parent, a.sorting");
		}

		// Edit the result
		if ($objArticle->numRows)
		{
			\System::loadLanguageFile('tl_article');

			while ($objArticle->next())
			{
				$key = $objArticle->parent . ' (ID ' . $objArticle->pid . ')';
				$arrArticle[$key][$objArticle->id] = $objArticle->title . ' (' . ($GLOBALS['TL_LANG']['tl_article'][$objArticle->inColumn] ?: $objArticle->inColumn) . ', ID ' . $objArticle->id . ')';
			}
		}

		return $arrArticle;

    }
    
}