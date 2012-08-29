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
<section class="archive<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<header>
    <h1>
        <?php echo htmlspecialchars($this->params->get('page_heading')); ?>
    </h1>
</header>
    <?php endif; ?>

<form id="adminForm" class="filter-search" action="<?php echo JRoute::_('index.php')?>" method="post">
    <fieldset class="filters">
        <legend class="hidelabeltxt"><?php echo JText::_('JGLOBAL_FILTER_LABEL'); ?></legend>
        <?php if ($this->params->get('filter_field') != 'hide') : ?>
        <label class="filter-search-lbl" for="filter-search"><?php echo JText::_('COM_CONTENT_' . $this->params->get('filter_field') . '_FILTER_LABEL') . '&#160;'; ?>
            <input type="text" name="filter-search" id="filter-search" value="<?php echo htmlspecialchars($this->filter); ?>" class="inputbox" onchange="document.getElementById('adminForm').submit();" />
        </label>
        <?php endif; ?>

        <?php echo $this->form->monthField; ?>
        <?php echo $this->form->yearField; ?>
        <?php echo $this->form->limitField; ?>
        <button type="submit" class="button btn small round"><?php echo JText::_('JGLOBAL_FILTER_BUTTON'); ?></button>
        <input type="hidden" name="view" value="archive">
        <input type="hidden" name="option" value="com_content">
        <input type="hidden" name="limitstart" value="0">
    </fieldset>
    <?php echo $this->loadTemplate('items'); ?>
</form>
</section>

