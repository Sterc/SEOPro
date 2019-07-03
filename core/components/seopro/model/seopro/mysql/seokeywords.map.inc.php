<?php
/**
 * @package seopro
 */
$xpdo_meta_map['seoKeywords']= array (
  'package' => 'seopro',
  'version' => null,
  'table' => 'seopro_keywords',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'resource' => 0,
    'keywords' => '',
  ),
  'fieldMeta' => 
  array (
    'resource' => 
    array (
      'dbtype' => 'integer',
      'precision' => '10',
      'phptype' => 'int',
      'null' => false,
      'default' => 0,
    ),
    'keywords' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
  ),
);
