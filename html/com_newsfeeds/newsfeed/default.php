<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla!+
 * @author        Cristina Solana http://nightshiftcreative.com
 * @author        Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright    Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

$lang = JFactory::getLanguage();
$myrtl = $this->newsfeed->rtl;
$direction = " ";

if ($lang->isRTL() && $myrtl == 0) {
    $direction = " redirect-rtl";
} else
    if ($lang->isRTL() && $myrtl == 1) {
        $direction = " redirect-ltr";
    } else
        if ($lang->isRTL() && $myrtl == 2) {
            $direction = " redirect-rtl";
        } else
            if ($myrtl == 0) {
                $direction = " redirect-ltr";
            } else
                if ($myrtl == 1) {
                    $direction = " redirect-ltr";
                } else
                    if ($myrtl == 2) {
                        $direction = " redirect-rtl";
                    }
?>
<section class="newsfeed<?php echo $this->pageclass_sfx?><?php echo $direction; ?>">
    <?php if ($this->params->get('show_page_heading', 1)) : ?>
    <h1 class="<?php echo $direction; ?>">
        <?php echo htmlspecialchars($this->params->get('page_heading')); ?>
    </h1>
    <?php endif; ?>
    <h2 class="<?php echo $direction; ?>">
        <a href="<?php echo $this->newsfeed->channel['link']; ?>" target="_blank">
            <?php echo str_replace('&apos;', "'", $this->newsfeed->channel['title']); ?></a>
    </h2>
    <?php if ($this->params->get('show_feed_description')) : ?>
    <p class="feed-description">
        <?php echo str_replace('&apos;', "'", $this->newsfeed->channel['description']); ?>
    </p>
    <?php endif; ?>

    <?php if (isset($this->newsfeed->image['url']) && isset($this->newsfeed->image['title']) && $this->params->get('show_feed_image')) : ?>
    <img src="<?php echo $this->newsfeed->image['url']; ?>" alt="<?php echo $this->newsfeed->image['title']; ?>" />
    <?php endif; ?>

    <ol>
        <?php foreach ($this->newsfeed->items as $item) : ?>
        <li>
            <?php if (!is_null($item->get_link())) : ?>
            <a href="<?php echo $item->get_link(); ?>" target="_blank">
                <?php echo $item->get_title(); ?></a>
            <?php endif; ?>
            <?php if ($this->params->get('show_item_description') && $item->get_description()) : ?>
            <p class="feed-item-description">
                <?php $text = $item->get_description();
                if ($this->params->get('show_feed_image', 0) == 0) {
                    $text = JFilterOutput::stripImages($text);
                }
                $text = JHtml::_('string.truncate', $text, $this->params->get('feed_character_count'));
                echo str_replace('&apos;', "'", $text);
                ?>
            </p>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ol>
</section>

