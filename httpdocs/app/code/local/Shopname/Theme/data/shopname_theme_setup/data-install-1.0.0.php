<?php

/**
 * Lets rename the main store so that all devs that grab the repo
 * will have this change made to their version too!
 */
$store = Mage::app()->getStore('default');

/**
 * Dont forget that here we may need to check that $store actually
 * returned a proper store before we try to make changes to it. What
 * if the devs database doesnt have a store with th code 'default',
 * this script would throw an error and we dont want that!
 */
try {
	$store->setName('My Brand New Store');
	$store->save();
} catch(Exception $e) {} // in this case we wont do anything with the error