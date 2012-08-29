<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla!+
 * @author        Cristina Solana http://nightshiftcreative.com
 * @author        Matt Thomas http://construct-framework.com | http://betweenbrain.com
 * @copyright    Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

JHtml::_('behavior.keepalive');

?>
<script type="text/javascript">
Joomla.submitbutton = function (pressbutton) {
    var form = document.getElementById('mailtoForm');

    // do field validation
    if (form.mailto.value == "" || form.from.value == "") {
        alert('<?php echo JText::_('COM_MAILTO_EMAIL_ERR_NOINFO'); ?>');
        return false;
    }
    form.submit();
}
</script>

<?php $data = $this->get('data'); ?>

<section id="mailto-window">
    <h2>
        <?php echo JText::_('COM_MAILTO_EMAIL_TO_A_FRIEND'); ?>
    </h2>

    <a class="mailto-close" href="javascript: void window.close()" title="<?php echo JText::_('COM_MAILTO_CLOSE_WINDOW'); ?>">
        <span><?php echo JText::_('COM_MAILTO_CLOSE_WINDOW'); ?></span>
    </a>

    <form action="<?php echo JURI::base() ?>index.php" id="mailtoForm" method="post">

        <label for="mailto_field">
            <?php echo JText::_('COM_MAILTO_EMAIL_TO'); ?>
            <input type="text" id="mailto_field" name="mailto" class="inputbox" size="25" value="<?php echo $this->escape($data->mailto) ?>" />
        </label>

        <label for="sender_field">
            <?php echo JText::_('COM_MAILTO_SENDER'); ?>
            <input type="text" id="sender_field" name="sender" class="inputbox" value="<?php echo $this->escape($data->sender) ?>" size="25" />
        </label>

        <label for="from_field">
            <?php echo JText::_('COM_MAILTO_YOUR_EMAIL'); ?>
            <input type="text" id="from_field" name="from" class="inputbox" value="<?php echo $this->escape($data->from) ?>" size="25" />
        </label>

        <label for="subject_field">
            <?php echo JText::_('COM_MAILTO_SUBJECT'); ?>
            <input type="text" id="subject_field" name="subject" class="inputbox" value="<?php echo $this->escape($data->subject) ?>" size="25" />
        </label>

        <button class="button btn" onclick="return Joomla.submitbutton('send');">
            <?php echo JText::_('COM_MAILTO_SEND'); ?>
        </button>

        <button class="button btn" onclick="window.close();return false;">
            <?php echo JText::_('COM_MAILTO_CANCEL'); ?>
        </button>

        <input type="hidden" name="layout" value="<?php echo $this->getLayout();?>" />
        <input type="hidden" name="option" value="com_mailto" />
        <input type="hidden" name="task" value="send" />
        <input type="hidden" name="tmpl" value="component" />
        <input type="hidden" name="link" value="<?php echo $data->link; ?>" />
        <?php echo JHtml::_('form.token'); ?>

    </form>
</section>

