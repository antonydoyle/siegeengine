<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla!+
 * @author        Cristina Solana http://nightshiftcreative.com
 * @author        Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright    Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

?>
<dl class="search-results<?php echo $this->pageclass_sfx; ?>">
<?php foreach ($this->results as $result) : ?>
<dt class="result-title">
    <?php echo $this->pagination->limitstart + $result->count . '. ';?>
    <?php if ($result->href) : ?>
    <a href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) : ?> target="_blank"<?php endif;?>>
        <?php echo htmlspecialchars($result->title);?>
    </a>
    <?php else: ?>
    <?php echo htmlspecialchars($result->title); ?>
    <?php endif; ?>
</dt>
    <?php if ($result->section) : ?>
    <dd class="result-category">
        <?php echo htmlspecialchars($result->section); ?>
    </dd>
        <?php endif; ?>
<dd class="result-text">
    <?php echo $result->text; ?>
</dd>
    <?php if ($this->params->get('show_date')) : ?>
    <time class="result-created">
        <?php echo JText::sprintf('JGLOBAL_CREATED_DATE_ON', $result->created); ?>
    </time>
        <?php endif; ?>
    <?php endforeach; ?>
</dl>

<nav class="pagination">
    <?php echo $this->pagination->getPagesLinks(); ?>
</nav>

