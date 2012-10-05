<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_latest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<ul class="latestnews<?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) :  ?>
	<li>
		<div class="lnTitle"><a href="<?php echo $item->link; ?>">
			<?php echo $item->title; ?></a></div>
            <div class="dateReadon">
    <div class="button date">    
		<?php
        $dateConvert =  $item->publish_up;
        // previous to PHP 5.1.0 you would compare with -1, instead of false
        if (($timestamp = strtotime($dateConvert)) === false) {
            echo "The string ($str) is bogus";
        } else {
            echo  date('F dS', $timestamp);
        }
        ?>
	</div>
		<a class="button date" href="<?php echo $item->link; ?>">►</a>
</div>
	<p><?php echo substr($item->introtext, 0, 98); ?>...</p>

	</li>
<?php endforeach; ?>
</ul>
