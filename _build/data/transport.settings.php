<?php
/**
 * @package seopro
 * @subpackage build
 */
$settings = array();

<<<<<<< HEAD
=======
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

>>>>>>> d130a3b592bd720e7fdeddcfc94223b0350e938b
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
<<<<<<< HEAD
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
=======
>>>>>>> d130a3b592bd720e7fdeddcfc94223b0350e938b
return $settings;