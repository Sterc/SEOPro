<?php
/**
 * Resolve creating db tables
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package seopro
 * @subpackage build
 *
 * @var mixed $object
 * @var modX $modx
 * @var array $options
 */

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modelPath = $modx->getOption('seopro.core_path', null, $modx->getOption('core_path') . 'components/seopro/') . 'model/';
            
            $modx->addPackage('seopro', $modelPath, null);



            $manager = $modx->getManager();

            $manager->createObjectContainer('seoKeywords');


            break;
    }
}

return true;