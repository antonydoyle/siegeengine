<?php defined('_JEXEC') or die;
/* =====================================================================
Template:	OneWeb for Joomla 2.5						            
Author: 	Seth Warburton - Internet Inspired! - @nternetinspired 				            
Version: 	2.0 											             
Created: 	June 2012                                                    
Copyright:	Seth Warburton - (C) 2012 - All rights reserved		
Licenses:	GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
			DBAD License http://philsturgeon.co.uk/code/dbad-license							             
Sources:	Beez5 by Angie Radkte				
/* ===================================================================== */

/* Let's make the module output using HTML5 elements */

function modChrome_html5($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) : ?>
    <article class="moduletable <?php echo $params->get('moduleclass_sfx'); ?>" id="module-<?php echo $module->id; ?>">
		<?php if ($module->showtitle) : ?>
                <h<?php echo $headerLevel; ?> class="module-title"><?php echo $module->title; ?></h<?php echo $headerLevel; ?>>
		<?php endif; ?>
            <section class="module-content"><?php echo $module->content; ?></section>
    </article>
	<?php endif;
}