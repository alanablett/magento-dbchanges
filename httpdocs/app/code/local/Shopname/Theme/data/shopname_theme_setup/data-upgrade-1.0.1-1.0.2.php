<?php

/**
 * Set the content of the homepage as well as its layout. As usual, we may want to guard
 * against certain conditions. For example the dev may not have a page called home in their
 * own version of the site. Put this in a try catch, or create a new page if one does not
 * already exist.
 */
Mage::getModel('cms/page')->load('home')
	->setContent(file_get_contents(__DIR__ . '/markup-1.0.2/homepage.html'))
	->setRootTemplate('one_column')
	->save();