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
 * Properties for the seoPro snippet.
 *
 * @package seopro
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_seopro.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Item',
        'lexicon' => 'seopro:properties',
    ),
    array(
        'name' => 'sortBy',
        'desc' => 'prop_seopro.sortby_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
        'lexicon' => 'seopro:properties',
    ),
    array(
        'name' => 'sortDir',
        'desc' => 'prop_seopro.sortdir_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'ASC',
        'lexicon' => 'seopro:properties',
    ),
    array(
        'name' => 'limit',
        'desc' => 'prop_seopro.limit_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 5,
        'lexicon' => 'seopro:properties',
    ),
    array(
        'name' => 'outputSeparator',
        'desc' => 'prop_seopro.outputseparator_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'seopro:properties',
    ),
    array(
        'name' => 'toPlaceholder',
        'desc' => 'prop_seopro.toplaceholder_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => true,
        'lexicon' => 'seopro:properties',
    ),
/*
    array(
        'name' => '',
        'desc' => 'prop_seopro.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'seopro:properties',
    ),
    */
);

return $properties;