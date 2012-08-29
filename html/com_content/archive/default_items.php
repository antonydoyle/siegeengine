<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla!+
 * @author        Cristina Solana http://nightshiftcreative.com
 * @author        Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright    Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$params = &$this->params; ?>

<ul id="archive-items">
    <?php foreach ($this->items as $i => $item) : ?>
    <li class="row<?php echo $i % 2; ?>">

        <h2>
            <?php if ($params->get('link_titles')): ?>
            <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug)); ?>">
                <?php echo htmlspecialchars($item->title); ?></a>
            <?php else: ?>
            <?php echo htmlspecialchars($item->title); ?>
            <?php endif; ?>
        </h2>

        <?php $useDefList = (($params->get('show_author')) or ($params->get('show_parent_category')) or ($params->get('show_category')) or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))  or ($params->get('show_hits'))); ?>

        <?php if ($useDefList) : ?>
     <header class="article-info">
        <hgroup>
             <h3 class="article-info-term">
                 <?php  echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?>
             </h3>
        <?php endif; ?>

        <?php if ($params->get('show_parent_category')) : ?>
        <h3 class="parent-category-name">
            <?php    $title = $this->escape($item->parent_title);
            $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->parent_slug)) . '">' . $title . '</a>';?>
            <?php if ($params->get('link_parent_category') && $item->parent_slug) : ?>
            <?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
            <?php else : ?>
            <?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
            <?php endif; ?>
        </h3>
        <?php endif; ?>

        <?php if ($params->get('show_category')) : ?>
        <h3 class="category-name">
            <?php    $title = $this->escape($item->category_title);
            $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug)) . '">' . $title . '</a>'; ?>
            <?php if ($params->get('link_category') && $item->catslug) : ?>
            <?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
            <?php else : ?>
            <?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
            <?php endif; ?>
        </h3>
        <?php endif; ?>
        <?php if ($useDefList) : ?>
        </hgroup>
    <?php endif; ?>

        <?php if ($params->get('show_create_date')) : ?>
        <time class="create">
            <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC2'))); ?>
        </time>
        <?php endif; ?>
        <?php if ($params->get('show_modify_date')) : ?>
        <time class="modified">
            <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
        </time>
        <?php endif; ?>
        <?php if ($params->get('show_publish_date')) : ?>
        <time class="published">
            <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
        </time>
        <?php endif; ?>
        <?php if ($params->get('show_author') && !empty($item->author)) : ?>
        <address class="createdby" rel="author">
            <?php $author = $item->author; ?>
            <?php $author = ($item->created_by_alias ? $item->created_by_alias : $author);?>

            <?php if (!empty($item->contactid) && $params->get('link_author') == true): ?>
            <?php     echo JText::sprintf('COM_CONTENT_WRITTEN_BY',
                JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id=' . $item->contactid), $author)); ?>

            <?php else : ?>
            <?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
            <?php endif; ?>
        </address>
        <?php endif; ?>
        <?php if ($params->get('show_hits')) : ?>
        <span class="hits">
            <?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
        </span>
        <?php endif; ?>
        <?php if ($useDefList) : ?>
    </header>
<?php endif; ?>

        <?php if ($params->get('show_intro')) : ?>
        <p class="intro">
            <?php echo JHtml::_('string.truncate', $item->introtext, $params->get('introtext_limit')); ?>
        </p>
        <?php endif; ?>
    </li>
    <?php endforeach; ?>
</ul>

<nav class="pagination">
    <p class="counter">
        <?php echo $this->pagination->getPagesCounter(); ?>
    </p>
    <?php echo $this->pagination->getPagesLinks(); ?>
</nav>

