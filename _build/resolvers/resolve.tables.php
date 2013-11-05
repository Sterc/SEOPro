<?php
/**
 * seoPro
 *
 * Copyright 2013 by Wieger Sloot, Sterc Internet & Marketing <modx@sterc.nl>
 *
 * seoPro is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * seoPro is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * seoPro; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package seopro
 */
/**
 * Resolve creating db tables
 *
 * @package seopro
 * @subpackage build
 */
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('seopro.core_path',null,$modx->getOption('core_path').'components/seopro/').'model/';
            $modx->addPackage('seopro',$modelPath);

            $manager = $modx->getManager();

            $manager->createObjectContainer('seoKeywords');

            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}
return true;