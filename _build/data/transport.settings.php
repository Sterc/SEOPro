<?php
/**
 * @package seopro
 * @subpackage build
 */
$settings = array();

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
$settings['seopro.version']= $modx->newObject('modSystemSetting');
$settings['seopro.version']->fromArray(array(
    'key' => 'seopro.version',
     'value' => PKG_VERSION,
     'xtype' => 'textfield',
    'namespace' => 'seopro',
     'area' => 'general',
),'',true,true);
$settings['seopro.usesitename']= $modx->newObject('modSystemSetting');
$settings['seopro.usesitename']->fromArray(array(
    'key' => 'seopro.usesitename',
     'value' => 1,
     'xtype' => 'combo-boolean',
    'namespace' => 'seopro',
     'area' => 'general',
),'',true,true);
$settings['seopro.allowbranding']= $modx->newObject('modSystemSetting');
$settings['seopro.allowbranding']->fromArray(array(
    'key' => 'seopro.allowbranding',
     'value' => 1,
     'xtype' => 'combo-boolean',
    'namespace' => 'seopro',
     'area' => 'general',
),'',true,true);
return $settings;