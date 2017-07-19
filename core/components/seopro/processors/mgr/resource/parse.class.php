<?php
/**
 * Get parsed resource
 *
 * @package seopro
 * @subpackage processors
 */
class seoProParseResourceProcessor extends modProcessor
{
    public $classKey = 'modResource';
    public $languageTopics = array('seopro:default');

    public function process()
    {
        $html = $this->getProperty('html');
        $resourceId = $this->getProperty('id');
        $resource = $this->modx->newObject('modResource');
        $resource->set('pagetitle', $this->getProperty('pagetitle'));
        $resource->set('longtitle', $this->getProperty('longtitle'));
        if ($resource) {
            $this->modx->resource = $resource;
            $maxIterations = (int)$this->modx->getOption('parser_max_iterations', null, 10);
            if (!$this->modx->parser) {
                $this->modx->getParser();
            }
            $this->modx->parser->processElementTags('', $html, true, false, '[[', ']]', array(), $maxIterations);
            $this->modx->parser->processElementTags('', $html, true, true, '[[', ']]', array(), $maxIterations);
        }

        return $this->outputArray(array('id' => $resourceId, 'output' => $html), 0);
    }

}
return 'seoProParseResourceProcessor';
