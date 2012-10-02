<?php defined('_JEXEC') or die;
// Load template framework 
include_once JPATH_THEMES . '/' . $this->template . '/framework.php'; 
?>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<jdoc:include type="head" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <!-- Included CSS Files -->
  <?php if ($customCSS > "0") : ?>
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/<?php echo $customCSS ?>">
  <?php endif; ?>	
  
  <?php if ($setWidth) : ?>
  <style>
  .row {
    width: <?php echo $setWidth ?>px;
}
</style>
 <?php endif; ?>
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $analytics ?>']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body>
<?php 
// Load template layout 
include_once JPATH_THEMES . '/' . $this->template . '/layouts/'.$templateLayout.''; 
?>
</body>

</html>
