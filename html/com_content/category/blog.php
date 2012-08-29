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
<section class="blog <?php echo $this->pageclass_sfx;?>">
<hgroup>
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<header>
	<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
</header>
<?php endif; ?>
<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
<header>
	<h2>
		<?php echo $this->escape($this->params->get('page_subheading')); ?>
		<?php if ($this->params->get('show_category_title')) : ?>
			<span class="subheading-category"><?php echo $this->category->title;?></span>
		<?php endif; ?>
    </h2>
</header>    
<?php endif; ?>
</hgroup>
<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
	<section class="category-desc">
	<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
		<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
	<?php endif; ?>
	<?php if ($this->params->get('show_description') && $this->category->description) : ?>
		<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
	<?php endif; ?>
	</section>
<?php endif; ?>

<?php $leadingcount=0 ; ?>
<?php if (!empty($this->lead_items)) : ?>
<section class="leading-articles">
	<?php foreach ($this->lead_items as &$item) : ?>
		<article class="article <?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> clearfix">
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
		</article>
		<?php
			$leadingcount++;
		?>
	<?php endforeach; ?>
</section>
<?php endif; ?>

<?php
	$introcount=(count($this->intro_items));
	$counter=0;
?>
<?php if (!empty($this->intro_items)) : ?>
<section class="intro-articles">
	<?php foreach ($this->intro_items as $key => &$item) : ?>
		<article class="article <?php echo $counter; ?> clearfix">
			<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
			?>
		</article>
		<?php $counter++; ?>
	<?php endforeach; ?>
</section>
<?php endif; ?>

<?php if (!empty($this->link_items)) : ?>
	<section class="more-articles">
	<?php echo $this->loadTemplate('links'); ?>
	</section>
<?php endif; ?>

<?php if (!empty($this->children[$this->category->id])&& $this->maxLevel != 0) : ?>
		<section class="cat-children">
		<h3>
<?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?>
</h3>
			<?php echo $this->loadTemplate('children'); ?>
		</section>
	<?php endif; ?>

<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<section class="pagination">
						<?php  if ($this->params->def('show_pagination_results', 1)) : ?>
						<p class="counter">
								<?php echo $this->pagination->getPagesCounter(); ?>
						</p>

				<?php endif; ?>
				<?php echo $this->pagination->getPagesLinks(); ?>
		</section>
<?php  endif; ?>

</section>
