<?php

/**
 * BaseDPH
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property integer $sazba
 * @property Doctrine_Collection $Zbozi
 * 
 * @method integer             getId()    Returns the current record's "id" value
 * @method string              getName()  Returns the current record's "name" value
 * @method string              getTitle() Returns the current record's "title" value
 * @method integer             getSazba() Returns the current record's "sazba" value
 * @method Doctrine_Collection getZbozi() Returns the current record's "Zbozi" collection
 * @method DPH                 setId()    Sets the current record's "id" value
 * @method DPH                 setName()  Sets the current record's "name" value
 * @method DPH                 setTitle() Sets the current record's "title" value
 * @method DPH                 setSazba() Sets the current record's "sazba" value
 * @method DPH                 setZbozi() Sets the current record's "Zbozi" collection
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDPH extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('d_p_h');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('title', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('sazba', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Zbozi', array(
             'local' => 'id',
             'foreign' => 'dph_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'name',
             ),
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}