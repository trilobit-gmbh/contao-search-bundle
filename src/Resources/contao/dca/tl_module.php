<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Table tl_module
 */

// Palettes

$GLOBALS['TL_DCA']['tl_module']['palettes']['search'] = str_replace
(
    ',fuzzy,',
    ',keywordsTotal,fuzzy,keywordsMinLength,keywordsMaxLength,',
    $GLOBALS['TL_DCA']['tl_module']['palettes']['search']
);

// Fields
$GLOBALS['TL_DCA']['tl_module']['fields']['keywordsTotal'] = array
(
    'label'            => &$GLOBALS['TL_LANG']['tl_module']['keywordsTotal'],
    'exclude'          => true,
    'inputType'        => 'text',
    'eval'             => array('rgxp'=>'digit', 'tl_class'=>'clr w50'),
    'sql'              => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['keywordsMinLength'] = array
(
    'label'            => &$GLOBALS['TL_LANG']['tl_module']['keywordsMinLength'],
    'exclude'          => true,
    'inputType'        => 'text',
    'eval'             => array('rgxp'=>'digit', 'tl_class'=>'clr w50'),
    'sql'              => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['keywordsMaxLength'] = array
(
    'label'            => &$GLOBALS['TL_LANG']['tl_module']['keywordsMaxLength'],
    'exclude'          => true,
    'inputType'        => 'text',
    'eval'             => array('rgxp'=>'digit', 'tl_class'=>'w50'),
    'sql'              => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['contextLength']['eval']['tl_class'] = 'clr w50';
$GLOBALS['TL_DCA']['tl_module']['fields']['perPage']['eval']['tl_class'] = 'clr w50';
