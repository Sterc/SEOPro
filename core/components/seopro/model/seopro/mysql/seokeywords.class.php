<?php
/**
 * @package seopro
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/seokeywords.class.php');
class seoKeywords_mysql extends seoKeywords {}