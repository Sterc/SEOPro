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
$events['onResourceDuplicate']= $modx->newObject('modPluginEvent');
$events['onResourceDuplicate']->fromArray(array(
    'event' => 'onResourceDuplicate',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);
$events['OnParseDocument']= $modx->newObject('modPluginEvent');
$events['OnParseDocument']->fromArray(array(
    'event' => 'OnParseDocument',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

return $events;
