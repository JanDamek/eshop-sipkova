<?php

/**
 * BaseMena
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $oznaceni
 * @property string $kurz_url
 * @property timestamp $last_auto_update
 * @property MenaKurz $MenaKurz
 * @property Doctrine_Collection $Setting
 * @property Doctrine_Collection $WebPay
 * @property Doctrine_Collection $ePlatba
 * @property Doctrine_Collection $PayPal
 * @property Doctrine_Collection $KurzCilovaMena
 * @property Doctrine_Collection $Doprava
 * @property Doctrine_Collection $PobockyDoprava
 * @property Doctrine_Collection $Platba
 * @property Doctrine_Collection $Objednavky
 * @property Doctrine_Collection $PolozkyObj
 * @property Doctrine_Collection $Platby
 * @property Doctrine_Collection $Zakaznik
 * @property Doctrine_Collection $Kosik
 * @property Doctrine_Collection $Dodavatel
 * @property Doctrine_Collection $Akce
 * @property Doctrine_Collection $Zbozi
 * @property Doctrine_Collection $Ceny
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getOznaceni()         Returns the current record's "oznaceni" value
 * @method string              getKurzUrl()          Returns the current record's "kurz_url" value
 * @method timestamp           getLastAutoUpdate()   Returns the current record's "last_auto_update" value
 * @method MenaKurz            getMenaKurz()         Returns the current record's "MenaKurz" value
 * @method Doctrine_Collection getSetting()          Returns the current record's "Setting" collection
 * @method Doctrine_Collection getWebPay()           Returns the current record's "WebPay" collection
 * @method Doctrine_Collection getEPlatba()          Returns the current record's "ePlatba" collection
 * @method Doctrine_Collection getPayPal()           Returns the current record's "PayPal" collection
 * @method Doctrine_Collection getKurzCilovaMena()   Returns the current record's "KurzCilovaMena" collection
 * @method Doctrine_Collection getDoprava()          Returns the current record's "Doprava" collection
 * @method Doctrine_Collection getPobockyDoprava()   Returns the current record's "PobockyDoprava" collection
 * @method Doctrine_Collection getPlatba()           Returns the current record's "Platba" collection
 * @method Doctrine_Collection getObjednavky()       Returns the current record's "Objednavky" collection
 * @method Doctrine_Collection getPolozkyObj()       Returns the current record's "PolozkyObj" collection
 * @method Doctrine_Collection getPlatby()           Returns the current record's "Platby" collection
 * @method Doctrine_Collection getZakaznik()         Returns the current record's "Zakaznik" collection
 * @method Doctrine_Collection getKosik()            Returns the current record's "Kosik" collection
 * @method Doctrine_Collection getDodavatel()        Returns the current record's "Dodavatel" collection
 * @method Doctrine_Collection getAkce()             Returns the current record's "Akce" collection
 * @method Doctrine_Collection getZbozi()            Returns the current record's "Zbozi" collection
 * @method Doctrine_Collection getCeny()             Returns the current record's "Ceny" collection
 * @method Mena                setId()               Sets the current record's "id" value
 * @method Mena                setName()             Sets the current record's "name" value
 * @method Mena                setOznaceni()         Sets the current record's "oznaceni" value
 * @method Mena                setKurzUrl()          Sets the current record's "kurz_url" value
 * @method Mena                setLastAutoUpdate()   Sets the current record's "last_auto_update" value
 * @method Mena                setMenaKurz()         Sets the current record's "MenaKurz" value
 * @method Mena                setSetting()          Sets the current record's "Setting" collection
 * @method Mena                setWebPay()           Sets the current record's "WebPay" collection
 * @method Mena                setEPlatba()          Sets the current record's "ePlatba" collection
 * @method Mena                setPayPal()           Sets the current record's "PayPal" collection
 * @method Mena                setKurzCilovaMena()   Sets the current record's "KurzCilovaMena" collection
 * @method Mena                setDoprava()          Sets the current record's "Doprava" collection
 * @method Mena                setPobockyDoprava()   Sets the current record's "PobockyDoprava" collection
 * @method Mena                setPlatba()           Sets the current record's "Platba" collection
 * @method Mena                setObjednavky()       Sets the current record's "Objednavky" collection
 * @method Mena                setPolozkyObj()       Sets the current record's "PolozkyObj" collection
 * @method Mena                setPlatby()           Sets the current record's "Platby" collection
 * @method Mena                setZakaznik()         Sets the current record's "Zakaznik" collection
 * @method Mena                setKosik()            Sets the current record's "Kosik" collection
 * @method Mena                setDodavatel()        Sets the current record's "Dodavatel" collection
 * @method Mena                setAkce()             Sets the current record's "Akce" collection
 * @method Mena                setZbozi()            Sets the current record's "Zbozi" collection
 * @method Mena                setCeny()             Sets the current record's "Ceny" collection
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMena extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mena');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('oznaceni', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 10,
             ));
        $this->hasColumn('kurz_url', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('last_auto_update', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('MenaKurz', array(
             'local' => 'id',
             'foreign' => 'vychozi_mena'));

        $this->hasMany('Setting', array(
             'local' => 'id',
             'foreign' => 'hlavni_mena'));

        $this->hasMany('WebPay', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('ePlatba', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('PayPal', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('MenaKurz as KurzCilovaMena', array(
             'local' => 'id',
             'foreign' => 'cilova_mena'));

        $this->hasMany('Doprava', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('PobockyDoprava', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('Platba', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('Objednavky', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('PolozkyObj', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('Platby', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('Zakaznik', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('Kosik', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('Dodavatel', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('Akce', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('Zbozi', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $this->hasMany('Ceny', array(
             'local' => 'id',
             'foreign' => 'mena_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'oznaceni',
             ),
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}