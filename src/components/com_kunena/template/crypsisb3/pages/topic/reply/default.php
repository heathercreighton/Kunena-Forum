<?php
/**
 * Kunena Component
 * @package         Kunena.Template.Crypsis
 * @subpackage      Pages.Topic
 *
 * @copyright       Copyright (C) 2008 - 2018 Kunena Team. All rights reserved.
 * @license         https://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link            https://www.kunena.org
 **/
defined('_JEXEC') or die;

$content = $this->execute('Topic/Form/Reply');

// Display breadcrumb path to the current category / topic / message / moderate.
$parents   = KunenaForumCategoryHelper::getParents($content->category->id);
$parents[] = $content->category;

// @var KunenaForumCategory $parent

foreach ($parents as $parent)
{
	$this->addBreadcrumb(
		$parent->displayField('name'),
		$parent->getUri()
	);
}

$this->addBreadcrumb(
	$content->topic->subject,
	$content->topic->getUri()
);

$this->addBreadcrumb(
	JText::_('COM_KUNENA_BUTTON_MESSAGE_REPLY'),
	null
);

echo $content;
