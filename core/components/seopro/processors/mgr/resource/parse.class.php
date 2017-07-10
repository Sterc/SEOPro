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

        $resource = $this->modx->getObject('modResource', $resourceId);
        if ($resource) {
            $this->modx->resource = $this->modx->getObject('modResource', $resourceId);
            $this->modx->resourceIdentifier = $resourceId;
            $maxIterations = (int)$this->modx->getOption('parser_max_iterations', null, 10);
            if (!$this->modx->parser) {
                $this->modx->getParser();
            }
            // Process the non-cacheable content of the Resource, but leave any unprocessed tags alone
            $this->modx->parser->processElementTags('', $html, true, false, '[[', ']]', array(), $maxIterations);

            // Process the non-cacheable content of the Resource, this time removing the unprocessed tags
            $this->modx->parser->processElementTags('', $html, true, true, '[[', ']]', array(), $maxIterations);
        }

        return $this->outputArray(array('id' => $resourceId,'output' => $html), 0);
    }

}
return 'seoProParseResourceProcessor';
