<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla!+
 * @author        Cristina Solana http://nightshiftcreative.com
 * @author        Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright    Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

?>
<script type="text/javascript">
function iFrameHeight() {
    var h = 0;
    if (!document.all) {
        h = document.getElementById('blockrandom').contentDocument.height;
        document.getElementById('blockrandom').style.height = h + 60 + 'px';
    } else if (document.all) {
        h = document.frames('blockrandom').document.body.scrollHeight;
        document.all.blockrandom.style.height = h + 20 + 'px';
    }
}
</script>
<section class="contentpane<?php echo $this->pageclass_sfx; ?>">
    <?php if ($this->params->get('show_page_heading', 1)) : ?>
    <h1>
        <?php if ($this->escape($this->params->get('page_heading'))) : ?>
        <?php echo htmlspecialchars($this->params->get('page_heading')); ?>
        <?php else : ?>
        <?php echo htmlspecialchars($this->params->get('page_title')); ?>
        <?php endif; ?>
    </h1>
    <?php endif; ?>
    <iframe <?php echo $this->wrapper->load; ?>
            id="blockrandom"
            name="iframe"
            src="<?php echo htmlspecialchars($this->wrapper->url); ?>"
            width="<?php echo htmlspecialchars($this->params->get('width')); ?>"
            height="<?php echo htmlspecialchars($this->params->get('height')); ?>"
            scrolling="<?php echo htmlspecialchars($this->params->get('scrolling')); ?>"
            frameborder="<?php echo $this->escape($this->params->get('frameborder', 1)); ?>"
            class="wrapper<?php echo $this->pageclass_sfx; ?>">
        <?php echo JText::_('COM_WRAPPER_NO_IFRAMES'); ?>
    </iframe>
</section>

