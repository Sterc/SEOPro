<?php
/**
 * @package seopro
 */
$xpdo_meta_map['seoKeywords']= array(
    'package' => 'seopro',
    'version' => NULL,
    'table' => 'seopro_keywords',
    'extends' => 'xPDOSimpleObject',
    'tableMeta' => array(
        'engine' => 'InnoDB',
    ),
    'fields' => array(
        'resource' => 0,
        'keywords' => '',
    ),
    'fieldMeta' => array(
        'resource' => array(
            'dbtype' => 'integer',
            'precision' => '10',
            'phptype' => 'int',
            'null' => false,
            'default' => 0,
            'index' => 'index',
        ),
        'keywords' => array(
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
            'default' => '',
        ),
    ),
    'indexes' => array(
        'resource' => array(
            'alias' => 'resource',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => array(
                'resource' => array(
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ),
            ),
        ),
    ),
    'aggregates' => array(
        'Resource' => array(
            'class' => 'modResource',
            'local' => 'resource',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'foreign',
        ),
    ),
);
