<?php

/**
 * BasePlatby
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property enum $stav
 * @property integer $zakaznik_id
 * @property integer $doprava_id
 * @property integer $platba_id
 * @property integer $pobocka_id
 * @property float $celkem
 * @property integer $mena_id
 * @property integer $obj_id
 * @property string $hash
 * @property Objednavky $Objednavky
 * @property Mena $Mena
 * @property Zakaznik $Zakaznik
 * @property Doprava $Doprava
 * @property Platba $Platba
 * @property PobockyDoprava $PobockyDoprava
 * 
 * @method integer        getId()             Returns the current record's "id" value
 * @method enum           getStav()           Returns the current record's "stav" value
 * @method integer        getZakaznikId()     Returns the current record's "zakaznik_id" value
 * @method integer        getDopravaId()      Returns the current record's "doprava_id" value
 * @method integer        getPlatbaId()       Returns the current record's "platba_id" value
 * @method integer        getPobockaId()      Returns the current record's "pobocka_id" value
 * @method float          getCelkem()         Returns the current record's "celkem" value
 * @method integer        getMenaId()         Returns the current record's "mena_id" value
 * @method integer        getObjId()          Returns the current record's "obj_id" value
 * @method string         getHash()           Returns the current record's "hash" value
 * @method Objednavky     getObjednavky()     Returns the current record's "Objednavky" value
 * @method Mena           getMena()           Returns the current record's "Mena" value
 * @method Zakaznik       getZakaznik()       Returns the current record's "Zakaznik" value
 * @method Doprava        getDoprava()        Returns the current record's "Doprava" value
 * @method Platba         getPlatba()         Returns the current record's "Platba" value
 * @method PobockyDoprava getPobockyDoprava() Returns the current record's "PobockyDoprava" value
 * @method Platby         setId()             Sets the current record's "id" value
 * @method Platby         setStav()           Sets the current record's "stav" value
 * @method Platby         setZakaznikId()     Sets the current record's "zakaznik_id" value
 * @method Platby         setDopravaId()      Sets the current record's "doprava_id" value
 * @method Platby         setPlatbaId()       Sets the current record's "platba_id" value
 * @method Platby         setPobockaId()      Sets the current record's "pobocka_id" value
 * @method Platby         setCelkem()         Sets the current record's "celkem" value
 * @method Platby         setMenaId()         Sets the current record's "mena_id" value
 * @method Platby         setObjId()          Sets the current record's "obj_id" value
 * @method Platby         setHash()           Sets the current record's "hash" value
 * @method Platby         setObjednavky()     Sets the current record's "Objednavky" value
 * @method Platby         setMena()           Sets the current record's "Mena" value
 * @method Platby         setZakaznik()       Sets the current record's "Zakaznik" value
 * @method Platby         setDoprava()        Sets the current record's "Doprava" value
 * @method Platby         setPlatba()         Sets the current record's "Platba" value
 * @method Platby         setPobockyDoprava() Sets the current record's "PobockyDoprava" value
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePlatby extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('platby');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('stav', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'V procesu',
              1 => 'Zamitnuto',
              2 => 'Zaplaceno',
             ),
             'default' => 'V procesu',
             ));
        $this->hasColumn('zakaznik_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('doprava_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('platba_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('pobocka_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('celkem', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('mena_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('obj_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('hash', 'string', 32, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 32,
             ));


        $this->index('hash', array(
             'fields' => 
             array(
              'hash' => 
              array(
              'sorting' => 'ASC',
              'length' => 32,
              ),
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Objednavky', array(
             'local' => 'obj_id',
             'foreign' => 'id'));

        $this->hasOne('Mena', array(
             'local' => 'mena_id',
             'foreign' => 'id'));

        $this->hasOne('Zakaznik', array(
             'local' => 'zakaznik_id',
             'foreign' => 'id'));

        $this->hasOne('Doprava', array(
             'local' => 'doprava_id',
             'foreign' => 'doprava_id'));

        $this->hasOne('Platba', array(
             'local' => 'platba_id',
             'foreign' => 'id'));

        $this->hasOne('PobockyDoprava', array(
             'local' => 'pobocka_id',
             'foreign' => 'pobocka_id'));

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