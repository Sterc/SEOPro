<?php
/**
 * @package seopro
 * @subpackage build
 */
$settings = array();

// $settings['seopro_help']= $modx->newObject('modSystemSetting');
// $settings['seopro_help']->fromArray(array(
//     'key' => 'seopro_help',
//     'value' => false,
//     'xtype' => 'combo-boolean',
//     'namespace' => 'seopro',
//     'area' => 'general',
// ),'',true,true);

// $settings['seopro_helpurl']= $modx->newObject('modSystemSetting');
// $settings['seopro_helpurl']->fromArray(array(
//     'key' => 'seopro_helpurl',
//     'value' => 'http://docs.sterc.nl/packages/seopro/help.html',
//     'xtype' => 'textfield',
//     'namespace' => 'seopro',
//     'area' => 'general',
// ),'',true,true);

$settings['seopro.delimiter']= $modx->newObject('modSystemSetting');
$settings['seopro.delimiter']->fromArray(array(
    'key' => 'seopro.delimiter',
     'value' => '|',
     'xtype' => 'textfield',
    'namespace' => 'seopro',
     'area' => 'general',
),'',true,true);
$settings['seopro.fields']= $modx->newObject('modSystemSetting');
$settings['seopro.fields']->fromArray(array(
    'key' => 'seopro.fields',
     'value' => 'pagetitle:70,longtitle:70,description:155,alias:2023,menutitle:2023',
     'xtype' => 'textfield',
    'namespace' => 'seopro',
     'area' => 'general',
),'',true,true);
return $settings;