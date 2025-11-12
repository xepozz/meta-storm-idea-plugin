<?php
namespace ObjectProperty{

class Entity {
    public static function factory(string $alias):mixed {}
}

/**
 * @property Author_Model $AuthorModel
 */
class Topic_Model extends Entity {
	protected $_hasMany = array(
		'authors' => array(),
		'posts' => array(),
	);
}

/**
 * @property Author_Metadata_Model $Author_Metadata
*/
Class Author_Model {
    protected $_hasOne = array(
        'author_metadata' => array(),
        'posts' => array(),
    );
}

class Author_Metadata_Model {
    public $id;
}

$topic = Entity::factory('Topic'); // is Site_Model

$authors = $topic->authors; // is Author_Model[]

$author = Entity::factory('Author');
$author->Author_Metadata->id;

}