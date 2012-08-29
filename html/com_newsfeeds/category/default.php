<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla!+
 * @author        Cristina Solana http://nightshiftcreative.com
 * @author        Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright    Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

?>
<section class="newsfeed-category<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h1>
    <?php echo htmlspecialchars($this->params->get('page_heading')); ?>
</h1>
    <?php endif; ?>
<?php if ($this->params->get('show_category_title', 1)) : ?>
<h2>
    <?php echo JHtml::_('content.prepare', $this->category->title, '', 'com_newsfeeds.category'); ?>
</h2>
    <?php endif; ?>
<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
<section class="category-desc clearfix">
    <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
    <img src="<?php echo $this->category->getParams()->get('image'); ?>" />
    <?php endif; ?>
    <?php if ($this->params->get('show_description') && $this->category->description) : ?>
    <?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_newsfeeds.category'); ?>
    <?php endif; ?>
</section>
    <?php endif; ?>

<?php echo $this->loadTemplate('items'); ?>

<?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
<section class="cat-children">
    <h3><?php echo JText::_('JGLOBAL_SUBCATEGORIES'); ?></h3>
    <?php echo $this->loadTemplate('children'); ?>
</section>
    <?php endif; ?>
</section>

