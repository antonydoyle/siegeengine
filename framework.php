<?php defined('_JEXEC') or die;
/* =====================================================================
Credit to:	Seth Warburton - Internet Inspired! - @nternetinspired. 		
Probably should be thanking Nescafe too... 		            
/* ===================================================================== */

// Define shortcuts for template parameters
$loadMoo 				= $this->params->get('loadMoo');
$setGeneratorTag		= $this->params->get('setGeneratorTag');
$analytics 				= $this->params->get('analytics');
$jQuery					= $this->params->get('jQuery');
$customCSS    			= $this->params->get('customCSS');
$logoUp    				= $this->params->get('logoUp');
$custLogo    			= $this->params->get('custLogo');
$unOrbit    			= $this->params->get('unOrbit');
$unReveal    			= $this->params->get('unReveal');
$unNav	    			= $this->params->get('unNav');
$unButt	    			= $this->params->get('unButt');
$unTabs	    			= $this->params->get('unTabs');
$unForms    			= $this->params->get('unForms');
$unTooltips    			= $this->params->get('unTooltips');
$unAccord	  			= $this->params->get('unAccord');
$unPlaceholder 			= $this->params->get('unPlaceholder');
$unAlerts				= $this->params->get('unAlerts');
$minFound				= $this->params->get('minFound');
$setWidth    			= $this->params->get('setWidth');
$templateLayout 		= $this->params->get('layout');
$offCanvas 				= $this->params->get('offCanvas');
$topButton    			= $this->params->get('topButton');
$sideButton	    			= $this->params->get('sideButton');

$pageTitle = $this->getTitle();
$option = JRequest::getCmd('option');
$view = JRequest::getCmd('view');
if ($option=="com_content" && $view=="article") {
    $ids = explode(':',JRequest::getString('id'));
    $article_id = $ids[0];
    $article =& JTable::getInstance("content");
    $article->load($article_id);
    
}

// Count Modules & Stuff
$offCanvasSideMenu = (int) ($this->countModules('offCanvasSideMenu') > 0);
$offCanvasSideModule = (int) ($this->countModules('offCanvasSideModule') > 0);

$offCanvasTopMenu = (int) ($this->countModules('offCanvasTopMenu') > 0);
$offCanvasTopModule = (int) ($this->countModules('offCanvasTopModule') > 0);

$logo = (int) ($this->countModules('logo') > 0);
$menu = (int) ($this->countModules('menu') > 0);

$orbit = (int) ($this->countModules('orbit') > 0);
$slideshow = (int) ($this->countModules('slideshow') > 0);

$breadcrumbs = (int) ($this->countModules('breadcrumbs') > 0);

$above1 = (int) ($this->countModules('above1') > 0);
$above2 = (int) ($this->countModules('above2') > 0);
$above3 = (int) ($this->countModules('above3') > 0);

$top1 = (int) ($this->countModules('top1') > 0);
$top2 = (int) ($this->countModules('top2') > 0);
$top3 = (int) ($this->countModules('top3') > 0);

$left = (int) ($this->countModules('left') > 0);
$right = (int) ($this->countModules('right') > 0);

$below1 = (int) ($this->countModules('below1') > 0);
$below2 = (int) ($this->countModules('below2') > 0);
$below3 = (int) ($this->countModules('below3') > 0);

$bottom1 = (int) ($this->countModules('bottom1') > 0);
$bottom2 = (int) ($this->countModules('bottom2') > 0);
$bottom3 = (int) ($this->countModules('bottom3') > 0);

$footerTop1 = (int) ($this->countModules('footerTop1') > 0);
$footerTop2 = (int) ($this->countModules('footerTop2') > 0);
$footerTop3 = (int) ($this->countModules('footerTop3') > 0);
$footerTop4 = (int) ($this->countModules('footerTop4') > 0);

$footer1 = (int) ($this->countModules('footer1') > 0);
$footer2 = (int) ($this->countModules('footer2') > 0);
$footer3 = (int) ($this->countModules('footer3') > 0);

$menuMod = (int) ($this->countModules('menuMod') > 0);

$menuModTitle 	= $this->params->get('menuModTitle');


// Get the column widths: There's probably a neater way to do it.

if (($right == "0") && ($left == "0")) {
$mainWidth = 'twelve columns';
}

elseif (($right != "0") && ($left == "0")) {
$mainWidth = 'nine columns'; $rightWidth = 'three columns';
}
elseif (($right == "0") && ($left != "0")) {
$mainWidth = 'nine columns'; $leftWidth = 'three columns';
}
elseif (($right != "0") && ($left != "0")) {
$mainWidth = 'eight columns'; $leftWidth = 'two columns'; $rightWidth = 'two columns';
}

//Peripheral module logic. 

// Top Module Logic
$top = compact( 'top1', 'top2', 'top3' );//get modules into array
sort( $top );//sort array so it is in numerical order
$code = implode( '', $top );//combine array to string for code to test
//set module classes
switch( $code ) {
    case '001': $topWidth = 'twelve columns'; break;
    case '011': $topWidth = 'six columns'; break;
    default: $topWidth = 'four columns'; break;
}
// above Module Logic
$above = compact( 'above1', 'above2', 'above3' );//get modules into array
sort( $above );//sort array so it is in numerical order
$code = implode( '', $above );//combine array to string for code to test
//set module classes
switch( $code ) {
    case '001': $aboveWidth = 'twelve columns'; break;
    case '011': $aboveWidth = 'six columns'; break;
    default: $aboveWidth = 'four columns'; break;
}
// Bottom Module Logic
$bottom = compact( 'bottom1', 'bottom2', 'bottom3' );//get modules into array
sort( $bottom );//sort array so it is in numerical order
$code = implode( '', $bottom );//combine array to string for code to test
//set module classes
switch( $code ) {
    case '001': $bottomWidth = 'twelve columns'; break;
    case '011': $bottomWidth = 'six columns'; break;
    default: $bottomWidth = 'four columns'; break;
}

// Below Module Logic
$below = compact( 'below1', 'below2', 'below3' );//get modules into array
sort( $below );//sort array so it is in numerical order
$code = implode( '', $below );//combine array to string for code to test
//set module classes
switch( $code ) {
    case '001': $belowWidth = 'twelve columns'; break;
    case '011': $belowWidth = 'six columns'; break;
    default: $belowWidth = 'four columns'; break;
}

// Footer Top Module Logic
$footertop = compact( 'footerTop1', 'footerTop2', 'footerTop3', 'footerTop4' );//get modules into array
sort( $footertop );//sort array so it is in numerical order
$code = implode( '', $footertop );//combine array to string for code to test
//set module classes
switch( $code ) {
    case '0001': $footerTopWidth = 'twelve columns'; break;
    case '0011': $footerTopWidth = 'six columns'; break;
	case '0111': $footerTopWidth = 'four columns'; break;
    default: $footerTopWidth = 'three columns'; break;
}

// Footer Module Logic
$footers = compact( 'footer1', 'footer2', 'footer3' );//get modules into array
sort( $footers );//sort array so it is in numerical order
$code = implode( '', $footers );//combine array to string for code to test
//set module classes
switch( $code ) {
    case '001': $footerWidth = 'twelve columns'; break;
    case '011': $footerWidth = 'six columns'; break;
    default: $footerWidth = 'four columns'; break;
}


#----------------------------- Construct Code Snippets-----------------------------#
// GPL code taken from Construct template framework by Matt Thomas http://construct-framework.com/

// To enable use of site configuration
$app 					= JFactory::getApplication();
$pageParams             = $app->getParams();
$sitename				= $app->getCfg('sitename');
// Returns a reference to the global document object
$doc = JFactory::getDocument();

// Define relative path to the current template directory
$template = 'templates/'.$this->template;

// Change generator tag
$this->setGenerator($setGeneratorTag);

// Remove MooTools if set to no.
if ( !$loadMoo ) {
	unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-more.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/modal.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools.js']);
    unset($doc->_scripts[$this->baseurl.'/plugins/system/mtupgrade/mootools.js']);
}

#-------------End Construct Code--------------------------------------#

// Add stylesheets etc
$doc->addStyleSheet($template.'/css/foundation.css');
$doc->addStyleSheet($template.'/css/templateCore.css');
$doc->addCustomTag('<script src="'.$template.'/js/modernizr.foundation.js"></script>');


 if ($minFound > 0) { 
    $doc->addCustomTag('<script src="'.$template.'/js/foundation.js"></script>');
  }
  else {
	  
   if ($jQuery > 0) {
    $doc->addCustomTag('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>');
   }
   if ($unReveal > 0) {
    $doc->addCustomTag('<script src="'.$template.'/js/jquery.foundation.reveal.js"></script>');
   }	

   if ($unOrbit  > 0) { 
  $doc->addCustomTag('<script src="'.$template.'/js/jquery.foundation.orbit.js"></script>');
   } 	

  if ($unNav > 0) {
  $doc->addCustomTag('<script src="'.$template.'/js/jquery.foundation.navigation.js"></script>');
  } 	

  if ($unButt > 0) {
  $doc->addCustomTag('<script src="'.$template.'/js/jquery.foundation.buttons.js"></script>');
  } 

  if ($unTabs > 0) {
  $doc->addCustomTag('<script src="'.$template.'/js/jquery.foundation.tabs.js"></script>');
  } 

  if ($unForms > 0) {
  $doc->addCustomTag('<script src="'.$template.'/js/jquery.foundation.forms.js"></script>');
  }

  if ($unTooltips > 0) {
  $doc->addCustomTag('<script src="'.$template.'/js/jquery.foundation.tooltips.js"></script>');
  }

  if ($unAccord > 0) {
  $doc->addCustomTag('<script src="'.$template.'/js/jquery.foundation.accordion.js"></script>');
  } 	

  if ($unPlaceholder > 0) { 
  $doc->addCustomTag('<script src="'.$template.'/js/jquery.placeholder.js"></script>');
  }

  if ($unAlerts > 0) {
  $doc->addCustomTag('<script src="'.$template.'/js/jquery.foundation.alerts.js"></script>');
  } 	
}
 if ($offCanvas > 0) {
	$doc->addStyleSheet($template.'/css/offcanvas.css');
	$doc->addCustomTag('<script src="'.$template.'/js/jquery.offcanvas.js"></script>');
  }
