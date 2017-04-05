<?php
/**
 * The base seoPro snippet.
 *
 * @package seopro
 */
$seoPro = $modx->getService('seopro', 'seoPro', $modx->getOption('seopro.core_path', null, $modx->getOption('core_path') . 'components/seopro/') . 'model/seopro/', $scriptProperties);
if (!($seoPro instanceof seoPro)) {
    return '';
}

$disabledTemplates = explode(',', $modx->getOption('seopro.disabledtemplates', null, '0'));

switch ($modx->event->name) {
    case 'OnDocFormRender':
        $template = ($resource->get('template')) ? (string)$resource->get('template') : (string)$_REQUEST['template'];
        if (in_array($template, $disabledTemplates)) {
            break;
        }
        $currClassKey = $resource->get('class_key');
        $strFields = $modx->getOption('seopro.fields', null, 'pagetitle:70,longtitle:70,description:155,alias:2023,menutitle:2023');
        $arrFields = array();
        if (is_array(explode(',', $strFields))) {
            foreach (explode(',', $strFields) as $field) {
                list($fieldName, $fieldCount) = explode(':', $field);
                $arrFields[$fieldName] = $fieldCount;
            }
        } else {
            return '';
        }

        $keywords = '';
        $modx->controller->addLexiconTopic('seopro:default');
        if ($mode == 'upd') {
            $url = $modx->makeUrl($resource->get('id'), '', '', 'full');
            $url = str_replace($resource->get('alias'), '<span id=\"seopro-replace-alias\">' . $resource->get('alias') . '</span>', $url);
            $seoKeywords = $modx->getObject('seoKeywords', array('resource' => $resource->get('id')));
            if ($seoKeywords) {
                $keywords = $seoKeywords->get('keywords');
            }
        } else {
            if ($_REQUEST['id']) {
                $url = $modx->makeUrl($_REQUEST['id'], '', '', 'full');
                $url .= '/<span id=\"seopro-replace-alias\"></span>';
            } else {
                $url = $modx->getOption('site_url') . '<span id=\"seopro-replace-alias\"></span>';
            }
        }

        if ($_REQUEST['id'] == $modx->getOption('site_start')) {
            unset($arrFields['alias']);
            unset($arrFields['menutitle']);
        }


        $config = $seoPro->config;
        unset($config['resource']);
        $modx->regClientStartupHTMLBlock('<script type="text/javascript">
        Ext.onReady(function() {
            seoPro.config = ' . $modx->toJSON($config) . ';
            seoPro.config.record = "' . $keywords . '";
            seoPro.config.values = {};
            seoPro.config.fields = "' . implode(",", array_keys($arrFields)) . '";
            seoPro.config.chars = ' . $modx->toJSON($arrFields) . '
            seoPro.config.url = "' . $url . '";
        });
    </script>');

        /* include CSS and JS*/
        $version = $modx->getVersionData();
        if($version['version'] == 2 && $version['major_version'] == 2){
            $modx->regClientCSS($seoPro->config['assetsUrl'] . 'css/mgr.css');
        }else{
            $modx->regClientCSS($seoPro->config['assetsUrl'] . 'css/mgr23.css');
        }
        $modx->regClientStartupScript($seoPro->config['assetsUrl'] . 'js/mgr/seopro.js??v=' . $modx->getOption('seopro.version', null, 'v1.0.0'));
        $modx->regClientStartupScript($seoPro->config['assetsUrl'] . 'js/mgr/resource.js?v=' . $modx->getOption('seopro.version', null, 'v1.0.0'));

        break;

    case 'OnDocFormSave':
        $template = ($resource->get('template')) ? (string)$resource->get('template') : (string)$_REQUEST['template'];
        if (in_array($template, $disabledTemplates)) {
            break;
        }
        $seoKeywords = $modx->getObject('seoKeywords', array('resource' => $resource->get('id')));
        if (!$seoKeywords && isset($resource)) {
            $seoKeywords = $modx->newObject('seoKeywords', array('resource' => $resource->get('id')));
        }
        if($seoKeywords){
            if (isset($_POST['keywords'])){
                $seoKeywords->set('keywords', trim($_POST['keywords'], ','));
            } else {
                $seoKeywords->set('keywords', '');
            }
            $seoKeywords->save();
        }
        break;

    case 'onResourceDuplicate':
        $template = ($resource->get('template')) ? (string)$resource->get('template') : (string)$_REQUEST['template'];
        if (in_array($template, $disabledTemplates)) {
            break;
        }
        $seoKeywords = $modx->getObject('seoKeywords', array('resource' => $resource->get('id')));
        if (!$seoKeywords) {
            $seoKeywords = $modx->newObject('seoKeywords', array('resource' => $resource->get('id')));
        }
        $newSeoKeywords = $modx->newObject('seoKeywords');
        $newSeoKeywords->fromArray($seoKeywords->toArray());
        $newSeoKeywords->set('resource', $newResource->get('id'));
        $newSeoKeywords->save();
        break;

    case 'OnLoadWebDocument':
        if ($modx->context->get('key') == "mgr") {
            break;
        }
        $template = ($modx->resource->get('template')) ? (string)$modx->resource->get('template') : '';
        if (in_array($template, $disabledTemplates)) {
            break;
        }
        $seoKeywords = $modx->getObject('seoKeywords', array('resource' => $modx->resource->get('id')));
        if ($seoKeywords) {
            $keyWords = $seoKeywords->get('keywords');
            $modx->setPlaceholder('seoPro.keywords', $keyWords);
        }
        $siteBranding = (boolean) $modx->getOption('seopro.allowbranding', null, true);
        $siteDelimiter = $modx->getOption('seopro.delimiter', null, '/');
        $siteUseSitename = (boolean) $modx->getOption('seopro.usesitename', null, true);
        $siteID = $modx->resource->get('id');
        $siteName = $modx->getOption('site_name');
        $longtitle = $modx->resource->get('longtitle');
        $pagetitle = $modx->resource->get('pagetitle');
        $seoProTitle = array();
        if ($siteID == $modx->getOption('site_start')) {
            $seoProTitle['pagetitle'] = !empty($longtitle) ? $longtitle : $siteName;
        } else {
            $seoProTitle['pagetitle'] = !empty($longtitle) ? $longtitle : $pagetitle;
            if ($siteUseSitename) {
                $seoProTitle['delimiter'] = $siteDelimiter;
                $seoProTitle['sitename'] = $siteName;
            }
        }
        $modx->setPlaceholder('seoPro.title', implode(" ", $seoProTitle));
        if ($siteBranding) {
            $modx->lexicon->load('seopro:default');
            $modx->regClientStartupHTMLBlock('<!-- ' . $modx->lexicon('seopro.branding_text') . '-->');
        }
        break;
}