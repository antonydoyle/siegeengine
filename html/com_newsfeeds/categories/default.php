<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla!+
 * @author        Cristina Solana http://nightshiftcreative.com
 * @author        Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright    Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

?>
<section class="categories-list<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h1>
    <?php echo htmlspecialchars($this->params->get('page_heading')); ?>
</h1>
    <?php endif; ?>

<?php if ($this->params->get('show_base_description')) : ?>
    <?php //If there is a description in the menu parameters use that;
    if ($this->params->get('categories_description')) : ?>
    <p class="category-desc base-desc">
        <?php echo  JHtml::_('content.prepare', $this->params->get('categories_description'), '', 'com_newsfeeds.categories'); ?>
    </p>
        <?php else:
        //Otherwise get one from the database if it exists.
        ?>
        <?php if ($this->parent->description) : ?>
    <section class="category-desc  base-desc">
        <?php  echo JHtml::_('content.prepare', $this->parent->description, '', 'com_newsfeeds.categories'); ?>
    </section>
        <?php endif; ?>
        <?php  endif; ?>
    <?php endif; ?>

<?php echo $this->loadTemplate('items'); ?>
</section>

