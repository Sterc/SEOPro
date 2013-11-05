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
 * The base class for seoPro.
 *
 * @package seopro
 */
class seoPro {
    /** @var \modX $modx */
    public $modx;
    /** @var array $config */
    public $config = array();
    /** @var array $chunks */
    public $chunks = array();

    function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;

        $corePath = $this->modx->getOption('seopro.core_path',$config,$this->modx->getOption('core_path').'components/seopro/');
        $assetsUrl = $this->modx->getOption('seopro.assets_url',$config,$this->modx->getOption('assets_url').'components/seopro/');
        $connectorUrl = $assetsUrl.'connector.php';

        $this->config = array_merge(array(
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl.'css/',
            'jsUrl' => $assetsUrl.'js/',
            'imagesUrl' => $assetsUrl.'images/',

            'connectorUrl' => $connectorUrl,

            'corePath' => $corePath,
            'modelPath' => $corePath.'model/',
            'chunksPath' => $corePath.'elements/chunks/',
            'chunkSuffix' => '.chunk.tpl',
            'snippetsPath' => $corePath.'elements/snippets/',
            'processorsPath' => $corePath.'processors/',
            'templatesPath' => $corePath.'templates/',
        ),$config);

        $this->modx->addPackage('seopro',$this->config['modelPath']);
        $this->modx->lexicon->load('seopro:default');
    }
}