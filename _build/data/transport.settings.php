<?php
/**
 * @package seopro
 * @subpackage build
 */
$settings = array();

$settings['seopro_help']= $modx->newObject('modSystemSetting');
$settings['seopro_help']->fromArray(array(
    'key' => 'seopro_help',
    'value' => false,
    'xtype' => 'combo-boolean',
    'namespace' => 'seopro',
    'area' => 'general',
),'',true,true);

$settings['seopro_helpurl']= $modx->newObject('modSystemSetting');
$settings['seopro_helpurl']->fromArray(array(
    'key' => 'seopro_helpurl',
    'value' => 'http://docs.sterc.nl/packages/seopro/help.html',
    'xtype' => 'textfield',
    'namespace' => 'seopro',
    'area' => 'general',
),'',true,true);


return $settings;