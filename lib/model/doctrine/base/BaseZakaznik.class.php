<?php

/**
 * BaseZakaznik
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property integer $skupina_id
 * @property integer $mena_id
 * @property string $jmeno
 * @property string $prijmeni
 * @property string $organizace
 * @property string $ulice
 * @property string $psc
 * @property string $mesto
 * @property integer $dorucit_id
 * @property string $ico
 * @property string $jmeno_ico
 * @property string $prijmeni_ico
 * @property string $organizace_ico
 * @property string $ulice_ico
 * @property string $psc_ico
 * @property string $mesto_ico
 * @property Skupina $Skupina
 * @property Mena $Mena
 * @property ZemeUrceni $ZemeUrceni
 * @property Doctrine_Collection $Objednavky
 * @property Doctrine_Collection $Platby
 * @property Doctrine_Collection $Kosik
 * @property Doctrine_Collection $Ceny
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method string              getUsername()       Returns the current record's "username" value
 * @method string              getEmail()          Returns the current record's "email" value
 * @method string              getPassword()       Returns the current record's "password" value
 * @method integer             getSkupinaId()      Returns the current record's "skupina_id" value
 * @method integer             getMenaId()         Returns the current record's "mena_id" value
 * @method string              getJmeno()          Returns the current record's "jmeno" value
 * @method string              getPrijmeni()       Returns the current record's "prijmeni" value
 * @method string              getOrganizace()     Returns the current record's "organizace" value
 * @method string              getUlice()          Returns the current record's "ulice" value
 * @method string              getPsc()            Returns the current record's "psc" value
 * @method string              getMesto()          Returns the current record's "mesto" value
 * @method integer             getDorucitId()      Returns the current record's "dorucit_id" value
 * @method string              getIco()            Returns the current record's "ico" value
 * @method string              getJmenoIco()       Returns the current record's "jmeno_ico" value
 * @method string              getPrijmeniIco()    Returns the current record's "prijmeni_ico" value
 * @method string              getOrganizaceIco()  Returns the current record's "organizace_ico" value
 * @method string              getUliceIco()       Returns the current record's "ulice_ico" value
 * @method string              getPscIco()         Returns the current record's "psc_ico" value
 * @method string              getMestoIco()       Returns the current record's "mesto_ico" value
 * @method Skupina             getSkupina()        Returns the current record's "Skupina" value
 * @method Mena                getMena()           Returns the current record's "Mena" value
 * @method ZemeUrceni          getZemeUrceni()     Returns the current record's "ZemeUrceni" value
 * @method Doctrine_Collection getObjednavky()     Returns the current record's "Objednavky" collection
 * @method Doctrine_Collection getPlatby()         Returns the current record's "Platby" collection
 * @method Doctrine_Collection getKosik()          Returns the current record's "Kosik" collection
 * @method Doctrine_Collection getCeny()           Returns the current record's "Ceny" collection
 * @method Zakaznik            setId()             Sets the current record's "id" value
 * @method Zakaznik            setUsername()       Sets the current record's "username" value
 * @method Zakaznik            setEmail()          Sets the current record's "email" value
 * @method Zakaznik            setPassword()       Sets the current record's "password" value
 * @method Zakaznik            setSkupinaId()      Sets the current record's "skupina_id" value
 * @method Zakaznik            setMenaId()         Sets the current record's "mena_id" value
 * @method Zakaznik            setJmeno()          Sets the current record's "jmeno" value
 * @method Zakaznik            setPrijmeni()       Sets the current record's "prijmeni" value
 * @method Zakaznik            setOrganizace()     Sets the current record's "organizace" value
 * @method Zakaznik            setUlice()          Sets the current record's "ulice" value
 * @method Zakaznik            setPsc()            Sets the current record's "psc" value
 * @method Zakaznik            setMesto()          Sets the current record's "mesto" value
 * @method Zakaznik            setDorucitId()      Sets the current record's "dorucit_id" value
 * @method Zakaznik            setIco()            Sets the current record's "ico" value
 * @method Zakaznik            setJmenoIco()       Sets the current record's "jmeno_ico" value
 * @method Zakaznik            setPrijmeniIco()    Sets the current record's "prijmeni_ico" value
 * @method Zakaznik            setOrganizaceIco()  Sets the current record's "organizace_ico" value
 * @method Zakaznik            setUliceIco()       Sets the current record's "ulice_ico" value
 * @method Zakaznik            setPscIco()         Sets the current record's "psc_ico" value
 * @method Zakaznik            setMestoIco()       Sets the current record's "mesto_ico" value
 * @method Zakaznik            setSkupina()        Sets the current record's "Skupina" value
 * @method Zakaznik            setMena()           Sets the current record's "Mena" value
 * @method Zakaznik            setZemeUrceni()     Sets the current record's "ZemeUrceni" value
 * @method Zakaznik            setObjednavky()     Sets the current record's "Objednavky" collection
 * @method Zakaznik            setPlatby()         Sets the current record's "Platby" collection
 * @method Zakaznik            setKosik()          Sets the current record's "Kosik" collection
 * @method Zakaznik            setCeny()           Sets the current record's "Ceny" collection
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseZakaznik extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('zakaznik');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('username', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('skupina_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('mena_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('jmeno', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('prijmeni', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('organizace', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('ulice', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('psc', 'string', 6, array(
             'type' => 'string',
             'length' => 6,
             ));
        $this->hasColumn('mesto', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('dorucit_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('ico', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
        $this->hasColumn('jmeno_ico', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('prijmeni_ico', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('organizace_ico', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('ulice_ico', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('psc_ico', 'string', 6, array(
             'type' => 'string',
             'length' => 6,
             ));
        $this->hasColumn('mesto_ico', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Skupina', array(
             'local' => 'skupina_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Mena', array(
             'local' => 'mena_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('ZemeUrceni', array(
             'local' => 'dorucit_id',
             'foreign' => 'id'));

        $this->hasMany('Objednavky', array(
             'local' => 'id',
             'foreign' => 'zakaznik_id'));

        $this->hasMany('Platby', array(
             'local' => 'id',
             'foreign' => 'zakaznik_id'));

        $this->hasMany('Kosik', array(
             'local' => 'id',
             'foreign' => 'zakaznik_id'));

        $this->hasMany('Ceny', array(
             'local' => 'id',
             'foreign' => 'zakaznik_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'username',
             ),
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}