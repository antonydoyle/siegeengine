<?php

 /* =====================================================================
Template:	OneWeb for Joomla 2.5						            
Author: 	Seth Warburton - Internet Inspired! - @nternetinspired 				            
Version: 	2.0 											             
Created: 	June 2012                                                    
Copyright:	Seth Warburton - (C) 2012 - All rights reserved		
Licenses:	GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
			DBAD License http://philsturgeon.co.uk/code/dbad-license
Source: 	J2.5.1. com_content/views/							             		
/* ===================================================================== */

// no direct access
defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
?>

<?php if ($this->params->get('show_page_heading', 1)) : ?>
<header>
<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
</header>
<?php endif; ?>
<section class="categories-list <?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_base_description')) : ?>
	<?php 	//If there is a description in the menu parameters use that; ?>
		<?php if($this->params->get('categories_description')) : ?>
			<?php echo  JHtml::_('content.prepare', $this->params->get('categories_description'), '', 'com_content.categories'); ?>
		<?php  else: ?>
			<?php //Otherwise get one from the database if it exists. ?>
			<?php  if ($this->parent->description) : ?>
				<div class="category-desc">
					<?php  echo JHtml::_('content.prepare', $this->parent->description, '', 'com_content.categories'); ?>
				</div>
			<?php  endif; ?>
		<?php  endif; ?>
	<?php endif; ?>
<?php
echo $this->loadTemplate('items');
?>
</section>
