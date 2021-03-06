<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::addIncludePath(JPATH_THEMES . '/foundout6/helpers');

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space
?>
<div class="blog-featured<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading') != 0) : ?>
<header class="page-header"><h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1></header>
<?php endif; ?>
<?php if (!empty($this->lead_items)) : ?>
<section class="leading-articles">
	<?php foreach ($this->lead_items as &$item) : ?>
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
	<?php endforeach; ?>
</section>
<?php endif; ?>
<?php if (!empty($this->intro_items)) : ?>
	<section class="intro-articles">
		<?php foreach ($this->intro_items as &$item) : ?>
				<?php
						$this->item = &$item;
						echo $this->loadTemplate('item');
				?>
		<?php endforeach; ?>
	</section>
<?php endif; ?>
<?php if (!empty($this->link_items)) : ?>
	<?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>
<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
	<nav class="pagination">
		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<?php echo $this->pagination->getPagesCounter(); ?>
		<?php  endif; ?>
				<?php echo $this->pagination->getPagesLinks(); ?>
	</nav>
<?php endif; ?>
</div>