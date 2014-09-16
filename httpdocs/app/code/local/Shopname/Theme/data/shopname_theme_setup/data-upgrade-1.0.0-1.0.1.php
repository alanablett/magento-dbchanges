<?php

/**
 * Lets change the html content of the footer_links_company static block that
 * comes as standard with a magento 1.9.0.1 install. Notice how we also use an actual
 * html file to store the content rather than breaking out of php or using
 * horrible heredoc <<<HTML <p>blah</p> HTML; syntax. We store them in a markup
 * directory that we can easily get to relative to this file. We also version
 * that folder in line with the module, so that we have a history of the
 * markup if it changes from one version to another.
 */
$blockData = array(
    'title' => 'Footer Links Company',
    'identifier' => 'footer_links_company',
    'content' => file_get_contents(__DIR__ . '/markup-1.0.1/footer.html'),
    'is_active' => 1,
    'stores' => array(0)
);

Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$block = Mage::getModel('cms/block')->load($blockData['identifier']);

/**
 * If the call to isObjectNew() returns true then we need to provide more data
 * to create the new block. Maybe the developer doesnt have this block already
 * in the database?
 */
if($block->isObjectNew()) {
    $block->setData($blockData)
        ->save();
}
/**
 * Otherwise we just set the ID of the block that we want to modify and change
 * its content before saving it
 */
else {
    $block->setIdentifier($blockData['identifier'])
        ->setContent($blockData['content'])
        ->save();
}