<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla!+
 * @author        Cristina Solana http://nightshiftcreative.com
 * @author        Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright    Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

?>
<section class="search<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<header>
    <h1>
        <?php if ($this->escape($this->params->get('page_heading'))) : ?>
        <?php echo htmlspecialchars($this->params->get('page_heading')); ?>
        <?php else : ?>
        <?php echo htmlspecialchars($this->params->get('page_title')); ?>
        <?php endif; ?>
    </h1>
</header>
    <?php endif; ?>

<?php echo $this->loadTemplate('form'); ?>
<?php if ($this->error == null && count($this->results) > 0) :
    echo $this->loadTemplate('results');
else :
    echo $this->loadTemplate('error');
endif; ?>
</section>

