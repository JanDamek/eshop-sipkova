<?php

/**
 * BasePolozkyObj
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $obj_id
 * @property enum $stav
 * @property integer $zbozi_id
 * @property float $mno
 * @property float $cena
 * @property float $sleva
 * @property integer $mena_id
 * @property Objednavky $Objednavky
 * @property Zbozi $Zbozi
 * @property Mena $Mena
 * 
 * @method integer    getId()         Returns the current record's "id" value
 * @method integer    getObjId()      Returns the current record's "obj_id" value
 * @method enum       getStav()       Returns the current record's "stav" value
 * @method integer    getZboziId()    Returns the current record's "zbozi_id" value
 * @method float      getMno()        Returns the current record's "mno" value
 * @method float      getCena()       Returns the current record's "cena" value
 * @method float      getSleva()      Returns the current record's "sleva" value
 * @method integer    getMenaId()     Returns the current record's "mena_id" value
 * @method Objednavky getObjednavky() Returns the current record's "Objednavky" value
 * @method Zbozi      getZbozi()      Returns the current record's "Zbozi" value
 * @method Mena       getMena()       Returns the current record's "Mena" value
 * @method PolozkyObj setId()         Sets the current record's "id" value
 * @method PolozkyObj setObjId()      Sets the current record's "obj_id" value
 * @method PolozkyObj setStav()       Sets the current record's "stav" value
 * @method PolozkyObj setZboziId()    Sets the current record's "zbozi_id" value
 * @method PolozkyObj setMno()        Sets the current record's "mno" value
 * @method PolozkyObj setCena()       Sets the current record's "cena" value
 * @method PolozkyObj setSleva()      Sets the current record's "sleva" value
 * @method PolozkyObj setMenaId()     Sets the current record's "mena_id" value
 * @method PolozkyObj setObjednavky() Sets the current record's "Objednavky" value
 * @method PolozkyObj setZbozi()      Sets the current record's "Zbozi" value
 * @method PolozkyObj setMena()       Sets the current record's "Mena" value
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePolozkyObj extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('polozky_obj');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('obj_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('stav', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Skladem',
              1 => 'Objednat',
              2 => 'Stornováno',
              3 => 'Vyskladneno',
             ),
             ));
        $this->hasColumn('zbozi_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('mno', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('cena', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('sleva', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('mena_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Objednavky', array(
             'local' => 'obj_id',
             'foreign' => 'id'));

        $this->hasOne('Zbozi', array(
             'local' => 'zbozi_id',
             'foreign' => 'zbozi_id'));

        $this->hasOne('Mena', array(
             'local' => 'mena_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'id',
             ),
             'canUpdate' => false,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}