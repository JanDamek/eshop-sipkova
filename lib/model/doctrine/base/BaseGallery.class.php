<?php

/**
 * BaseGallery
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $path
 * @property boolean $is_active
 * @property Doctrine_Collection $GalleryImages
 * @property Doctrine_Collection $Stranky
 * @property Doctrine_Collection $Akce
 * @property Doctrine_Collection $Zbozi
 * 
 * @method string              getTitle()         Returns the current record's "title" value
 * @method string              getDescription()   Returns the current record's "description" value
 * @method string              getKeywords()      Returns the current record's "keywords" value
 * @method string              getPath()          Returns the current record's "path" value
 * @method boolean             getIsActive()      Returns the current record's "is_active" value
 * @method Doctrine_Collection getGalleryImages() Returns the current record's "GalleryImages" collection
 * @method Doctrine_Collection getStranky()       Returns the current record's "Stranky" collection
 * @method Doctrine_Collection getAkce()          Returns the current record's "Akce" collection
 * @method Doctrine_Collection getZbozi()         Returns the current record's "Zbozi" collection
 * @method Gallery             setTitle()         Sets the current record's "title" value
 * @method Gallery             setDescription()   Sets the current record's "description" value
 * @method Gallery             setKeywords()      Sets the current record's "keywords" value
 * @method Gallery             setPath()          Sets the current record's "path" value
 * @method Gallery             setIsActive()      Sets the current record's "is_active" value
 * @method Gallery             setGalleryImages() Sets the current record's "GalleryImages" collection
 * @method Gallery             setStranky()       Sets the current record's "Stranky" collection
 * @method Gallery             setAkce()          Sets the current record's "Akce" collection
 * @method Gallery             setZbozi()         Sets the current record's "Zbozi" collection
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGallery extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('gallery');
        $this->hasColumn('title', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('keywords', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('path', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('GalleryImage as GalleryImages', array(
             'local' => 'id',
             'foreign' => 'gallery_id'));

        $this->hasMany('Stranky', array(
             'local' => 'id',
             'foreign' => 'gallery_id'));

        $this->hasMany('Akce', array(
             'local' => 'id',
             'foreign' => 'gallery_id'));

        $this->hasMany('Zbozi', array(
             'local' => 'id',
             'foreign' => 'gallery_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => false,
             'fields' => 
             array(
              0 => 'title',
             ),
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}