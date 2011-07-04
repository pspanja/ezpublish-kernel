<?php
/**
 * ez Publish - Public API Prototype
 */
namespace ezp\content;
use \ezp\base\ServiceContainer, \ezp\base\Configuration, ezp\base\Autoloader;

chdir( '../' );
require 'config.php';
require 'ezp/base/autoloader.php';
spl_autoload_register( array( new Autoloader( $settings['base']['autoload'] ), 'load' ) );

$paths = array();
foreach ( glob( '{ezp,ezx}/*', GLOB_BRACE | GLOB_ONLYDIR ) as $path )//@todo Take from configuration
{
    $paths[] = "{$path}/settings/";
}
Configuration::setGlobalConfigurationData( $settings );
Configuration::setGlobalDirs( $paths, 'modules' );


// Create ContentType manually for test
$contentType = new ContentType();
$contentType->identifier = 'article';

// Add some fields
$fields = array( 'title' => 'ezstring', 'tags' => 'ezkeyword' );
foreach ( $fields as $identifier => $fieldTypeString )
{
    $field = new ContentTypeField( $contentType );
    $field->identifier = $identifier;
    $field->fieldTypeString = $fieldTypeString;
    $contentType->fields[] = $field;
}

// Create section
$section = Section::__set_state( array( 'id' => 1 ) );
$section->identifier = 'standard';
$section->name = "Standard";

// Create Content object
$content = new Content( $contentType );
$content->ownerId = 10;
$content->section = $section;

$content->fields['tags'] = 'ezpublish, demo, public, api';
$content->fields['title'] = 'My new Article';
// shortcut for: $content->fields['title']->value = 'My new Article';

$content->notify( 'store' );// Needed to make sure changes in fieldtypes tricle down to field



echo "Content id: {$content->id}<br />";

echo "Fields:<br />";
foreach ( $content->fields as $identifier => $field )
{
    echo "$identifier: {$field->type->value}<br />";    
}

