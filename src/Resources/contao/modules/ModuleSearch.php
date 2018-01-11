<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Trilobit\SearchBundle;

use Input;


/**
 * Class ModuleSearch
 * @package Trilobit\SearchBundle
 */
class ModuleSearch extends \Contao\ModuleSearch
{

    /**
     * Display a wildcard in the back end
     *
     * @return string
     */
    public function generate()
    {
        return parent::generate();
    }


    /**
     * Generate the module
     */
    protected function compile()
    {
        // Trigger the search module from a custom form
        if (!isset($_GET['keywords']) && Input::post('FORM_SUBMIT') == 'tl_search')
        {
            $_GET['keywords'] = Input::post('keywords');
        }

        $strKeywords = trim(Input::get('keywords'));

        // minlength string
        if ($this->keywordsMinLength > 0)
        {
            $this->Template->minLength = intval($this->keywordsMinLength, 10);

            if (strlen($strKeywords) < $this->keywordsMinLength)
            {
                $strKeywords = '';
            }
        }

        // maxlength string
        if ($this->keywordsMaxLength > 0)
        {
            $this->Template->maxLength = intval($this->keywordsMaxLength, 10);

            $strKeywords = substr($strKeywords, 0, $this->keywordsMaxLength);
            $strKeywords = trim($strKeywords);
        }

        // max count keywords
        if ($this->keywordsTotal > 0)
        {
            $arrTemp = explode(' ', $strKeywords);

            if (count($arrTemp) >= $this->keywordsTotal)
            {
                $strKeywords = '';

                foreach (range(0, --$this->keywordsTotal) as $key)
                {
                    $strKeywords .= ' ' . $arrTemp[$key];
                }
            }

        }

        Input::setGet('keywords', trim($strKeywords));

        parent::compile();
    }
}
