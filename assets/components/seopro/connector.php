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
 * seoPro Connector
 *
 * @package seopro
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('seopro.core_path',null,$modx->getOption('core_path').'components/seopro/');
require_once $corePath.'model/seopro/seopro.class.php';
$modx->seopro = new seoPro($modx);

$modx->lexicon->load('seopro:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->seopro->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));