<?php
/**
 * File containing the (content) Version class
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 *
 */

namespace ezp\Persistence\Content;
use ezp\Persistence\ValueObject;

/**
 * Struct containing properties for a Version entity.
 */
class Version extends ValueObject
{
    /**
     * Version ID.
     *
     * @var mixed
     */
    public $id;

    /**
     * Version number.
     *
     * In contrast to {@link $id}, this is the version number, which only
     * increments in scope of a single Content object.
     *
     * @var int
     */
    public $versionNo;

    /**
     * @var int
     */
    public $modified;

    /**
     * Creator user ID.
     *
     * @var mixed
     */
    public $creatorId;

    /**
     * @var int
     */
    public $created;

    /**
     * DRAFT, PUBLISHED, ARCHIVED.
     *
     * @var int Constant.
     */
    public $state;

    /**
     * Content ID.
     *
     * @var mixed
     */
    public $contentId;

    /**
     * Loaded content fields in this version.
     *
     * Contains all fields for all languages of this version. Fields which are
     * not translatable wil only be contained once.
     *
     * @var array(Field)
     */
    public $fields = array();
}
?>
