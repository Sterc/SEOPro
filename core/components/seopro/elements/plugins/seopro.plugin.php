<?php
/**
 * The base seoPro snippet.
 *
 * @package seopro
 */

$seoPro = $modx->getService('seopro','seoPro',$modx->getOption('seopro.core_path',null,$modx->getOption('core_path').'components/seopro/').'model/seopro/',$scriptProperties);
if (!($seoPro instanceof seoPro)) return '';

switch($modx->event->name) {
    case 'OnDocFormRender':
   $currClassKey = $resource->get('class_key');
		$strFields = $modx->getOption('seopro.fields',null,'pagetitle:70,longtitle:70,description:155,alias:2023,menutitle:2023');
		$arrFields = array();
		if(is_array(explode(',',$strFields))){
  		foreach(explode(',',$strFields) as $field){
	  		list($fieldName,$fieldCount) = explode(':',$field);
	  		$arrFields[$fieldName] = $fieldCount;
	  	}
		}else{
  		return '';
		}
		
	$keywords = '';
	$modx->controller->addLexiconTopic('seopro:default');
	if($_REQUEST['id'] && $_REQUEST['a'] == 30){
		$url = $modx->makeUrl($resource->get('id'), '', '', 'full');
		$url = str_replace($resource->get('alias'), '<span id=\"seopro-replace-alias\">'.$resource->get('alias').'</span>', $url);
		$seoKeywords = $modx->getObject('seoKeywords', array('resource' => $resource->get('id')));
		if($seoKeywords){
			$keywords = $seoKeywords->get('keywords');
		}
	}elseif($_REQUEST['a'] == 55){
		if($_REQUEST['id']){
			$url = $modx->makeUrl($_REQUEST['id'], '', '', 'full');
			$url .= '/<span id=\"seopro-replace-alias\"></span>';
		}else{
			$url = $modx->getOption('site_url').'<span id=\"seopro-replace-alias\"></span>';
		}
	}
	
	if($_REQUEST['id'] == $modx->getOption('site_start')){
		unset($arrFields['alias']);
		unset($arrFields['menutitle']);
	}


	$config = $seoPro->config;
	unset($config['resource']);
	$modx->regClientStartupHTMLBlock('<script type="text/javascript">
		Ext.onReady(function() {
			seoPro.config = '.$modx->toJSON($config).';
			seoPro.config.record = "'.$keywords.'";
			seoPro.config.values = {};
			seoPro.config.fields = "'.implode(",",array_keys($arrFields)).'";
			seoPro.config.chars = '.$modx->toJSON($arrFields).'
			seoPro.config.url = "'.$url.'";
		});
	</script>');
	$modx->regClientCSS($seoPro->config['assetsUrl'].'css/mgr.css');
	$modx->regClientStartupScript($seoPro->config['assetsUrl'].'js/mgr/seopro.js');
	$modx->regClientStartupScript($seoPro->config['assetsUrl'].'js/mgr/resource.js');
	
    break;

    case 'OnDocFormSave':
		$seoKeywords = $modx->getObject('seoKeywords', array('resource' => $_POST['id']));
		if(!$seoKeywords) $seoKeywords = $modx->newObject('seoKeywords', array('resource' => $_POST['id']));
		$seoKeywords->set('keywords', trim($_POST['keywords'], ','));
		$seoKeywords->save();
    break;

    case 'onResourceDuplicate':
		$seoKeywords = $modx->getObject('seoKeywords', array('resource' => $resource->get('id')));
		if(!$seoKeywords) $seoKeywords = $modx->newObject('seoKeywords', array('resource' => $resource->get('id')));

		$newSeoKeywords = $modx->newObject('seoKeywords');
		$newSeoKeywords->fromArray($seoKeywords->toArray());
		$newSeoKeywords->set('resource', $newResource->get('id'));
		$newSeoKeywords->save();
    break;
    case 'OnParseDocument':
            if($modx->context->get('key') == "mgr") break;
            $seoKeywords = $modx->getObject('seoKeywords', array('resource' => $modx->resource->get('id')));
            if ($seoKeywords) {
                $keyWords = $seoKeywords->get('keywords');
                $modx->setPlaceholder('keywords', $keyWords);
            }
    break;
}