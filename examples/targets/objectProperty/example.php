<?php
namespace ObjectProperty{

class Entity {
    public static function factory(string $alias):mixed {}
}

/**
 * @property string $topic_id
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

/**
 * @property Topic_Model $topic
 */
class Author_Metadata_Model {
    public $id;
}

$topic = Entity::factory('Topic'); // is Site_Model
$topic->authors->Author_Metadata->topic->topic_id;

$authors = $topic->authors->Author_Metadata; // is Author_Model[]

$author = Entity::factory('Author');
$author->Author_Metadata->id;

}