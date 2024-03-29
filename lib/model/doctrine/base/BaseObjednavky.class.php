<?php

/**
 * BaseObjednavky
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property enum $typ
 * @property enum $stav
 * @property integer $zakaznik_id
 * @property integer $doprava_id
 * @property integer $platba_id
 * @property integer $pobocka_id
 * @property float $sleva
 * @property float $celkem_dopl
 * @property float $celkem
 * @property integer $mena_id
 * @property Zakaznik $Zakaznik
 * @property Doprava $Doprava
 * @property Platba $Platba
 * @property PobockyDoprava $PobockyDoprava
 * @property Mena $Mena
 * @property Doctrine_Collection $Polozky
 * @property Doctrine_Collection $Platby
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method enum                getTyp()            Returns the current record's "typ" value
 * @method enum                getStav()           Returns the current record's "stav" value
 * @method integer             getZakaznikId()     Returns the current record's "zakaznik_id" value
 * @method integer             getDopravaId()      Returns the current record's "doprava_id" value
 * @method integer             getPlatbaId()       Returns the current record's "platba_id" value
 * @method integer             getPobockaId()      Returns the current record's "pobocka_id" value
 * @method float               getSleva()          Returns the current record's "sleva" value
 * @method float               getCelkemDopl()     Returns the current record's "celkem_dopl" value
 * @method float               getCelkem()         Returns the current record's "celkem" value
 * @method integer             getMenaId()         Returns the current record's "mena_id" value
 * @method Zakaznik            getZakaznik()       Returns the current record's "Zakaznik" value
 * @method Doprava             getDoprava()        Returns the current record's "Doprava" value
 * @method Platba              getPlatba()         Returns the current record's "Platba" value
 * @method PobockyDoprava      getPobockyDoprava() Returns the current record's "PobockyDoprava" value
 * @method Mena                getMena()           Returns the current record's "Mena" value
 * @method Doctrine_Collection getPolozky()        Returns the current record's "Polozky" collection
 * @method Doctrine_Collection getPlatby()         Returns the current record's "Platby" collection
 * @method Objednavky          setId()             Sets the current record's "id" value
 * @method Objednavky          setTyp()            Sets the current record's "typ" value
 * @method Objednavky          setStav()           Sets the current record's "stav" value
 * @method Objednavky          setZakaznikId()     Sets the current record's "zakaznik_id" value
 * @method Objednavky          setDopravaId()      Sets the current record's "doprava_id" value
 * @method Objednavky          setPlatbaId()       Sets the current record's "platba_id" value
 * @method Objednavky          setPobockaId()      Sets the current record's "pobocka_id" value
 * @method Objednavky          setSleva()          Sets the current record's "sleva" value
 * @method Objednavky          setCelkemDopl()     Sets the current record's "celkem_dopl" value
 * @method Objednavky          setCelkem()         Sets the current record's "celkem" value
 * @method Objednavky          setMenaId()         Sets the current record's "mena_id" value
 * @method Objednavky          setZakaznik()       Sets the current record's "Zakaznik" value
 * @method Objednavky          setDoprava()        Sets the current record's "Doprava" value
 * @method Objednavky          setPlatba()         Sets the current record's "Platba" value
 * @method Objednavky          setPobockyDoprava() Sets the current record's "PobockyDoprava" value
 * @method Objednavky          setMena()           Sets the current record's "Mena" value
 * @method Objednavky          setPolozky()        Sets the current record's "Polozky" collection
 * @method Objednavky          setPlatby()         Sets the current record's "Platby" collection
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseObjednavky extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('objednavky');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('typ', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Přijato',
              1 => 'Odeslano',
              2 => 'Doruceno',
              3 => 'Stornováno',
             ),
             'default' => 'Přijato',
             ));
        $this->hasColumn('stav', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Nezaplaceno',
              1 => 'Zaplaceno',
             ),
             'default' => 'Nezaplaceno',
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
        $this->hasColumn('sleva', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('celkem_dopl', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('celkem', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('mena_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
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

        $this->hasOne('Mena', array(
             'local' => 'mena_id',
             'foreign' => 'id'));

        $this->hasMany('PolozkyObj as Polozky', array(
             'local' => 'id',
             'foreign' => 'obj_id'));

        $this->hasMany('Platby', array(
             'local' => 'id',
             'foreign' => 'obj_id'));

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