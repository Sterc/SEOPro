<?php
/**
 * @package seopro
 * @subpackage build
 */
$events = array();

$events['OnDocFormRender']= $modx->newObject('modPluginEvent');
$events['OnDocFormRender']->fromArray(array(
    'event' => 'OnDocFormRender',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);
$events['OnDocFormSave']= $modx->newObject('modPluginEvent');
$events['OnDocFormSave']->fromArray(array(
    'event' => 'OnDocFormSave',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);
$events['OnResourceDuplicate']= $modx->newObject('modPluginEvent');
$events['OnResourceDuplicate']->fromArray(array(
    'event' => 'OnResourceDuplicate',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);
$events['OnLoadWebDocument']= $modx->newObject('modPluginEvent');
$events['OnLoadWebDocument']->fromArray(array(
    'event' => 'OnLoadWebDocument',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);
$events['OnLoadWebDocument']= $modx->newObject('modPluginEvent');
$events['OnLoadWebDocument']->fromArray(array(
    'event' => 'OnLoadWebDocument',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

return $events;
