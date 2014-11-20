<?php

/**
 * BaseSetting
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $SiteName
 * @property string $email
 * @property string $email2
 * @property string $tel
 * @property string $mobil
 * @property clob $pracovni_doba
 * @property string $ulice
 * @property string $mesto
 * @property string $ga_code
 * @property string $google_overeni
 * @property integer $hlavni_mena
 * @property integer $vychozi_skupina_id
 * @property integer $skupina_host_id
 * @property integer $skupina_vel_id
 * @property enum $interval_typ
 * @property integer $interval_kontroly_meny
 * @property Mena $Mena
 * @property Skupina $SkupinaVychozi
 * @property Skupina $SkupinaHost
 * @property Skupina $SkupinaVel
 * 
 * @method integer getId()                     Returns the current record's "id" value
 * @method string  getSiteName()               Returns the current record's "SiteName" value
 * @method string  getEmail()                  Returns the current record's "email" value
 * @method string  getEmail2()                 Returns the current record's "email2" value
 * @method string  getTel()                    Returns the current record's "tel" value
 * @method string  getMobil()                  Returns the current record's "mobil" value
 * @method clob    getPracovniDoba()           Returns the current record's "pracovni_doba" value
 * @method string  getUlice()                  Returns the current record's "ulice" value
 * @method string  getMesto()                  Returns the current record's "mesto" value
 * @method string  getGaCode()                 Returns the current record's "ga_code" value
 * @method string  getGoogleOvereni()          Returns the current record's "google_overeni" value
 * @method integer getHlavniMena()             Returns the current record's "hlavni_mena" value
 * @method integer getVychoziSkupinaId()       Returns the current record's "vychozi_skupina_id" value
 * @method integer getSkupinaHostId()          Returns the current record's "skupina_host_id" value
 * @method integer getSkupinaVelId()           Returns the current record's "skupina_vel_id" value
 * @method enum    getIntervalTyp()            Returns the current record's "interval_typ" value
 * @method integer getIntervalKontrolyMeny()   Returns the current record's "interval_kontroly_meny" value
 * @method Mena    getMena()                   Returns the current record's "Mena" value
 * @method Skupina getSkupinaVychozi()         Returns the current record's "SkupinaVychozi" value
 * @method Skupina getSkupinaHost()            Returns the current record's "SkupinaHost" value
 * @method Skupina getSkupinaVel()             Returns the current record's "SkupinaVel" value
 * @method Setting setId()                     Sets the current record's "id" value
 * @method Setting setSiteName()               Sets the current record's "SiteName" value
 * @method Setting setEmail()                  Sets the current record's "email" value
 * @method Setting setEmail2()                 Sets the current record's "email2" value
 * @method Setting setTel()                    Sets the current record's "tel" value
 * @method Setting setMobil()                  Sets the current record's "mobil" value
 * @method Setting setPracovniDoba()           Sets the current record's "pracovni_doba" value
 * @method Setting setUlice()                  Sets the current record's "ulice" value
 * @method Setting setMesto()                  Sets the current record's "mesto" value
 * @method Setting setGaCode()                 Sets the current record's "ga_code" value
 * @method Setting setGoogleOvereni()          Sets the current record's "google_overeni" value
 * @method Setting setHlavniMena()             Sets the current record's "hlavni_mena" value
 * @method Setting setVychoziSkupinaId()       Sets the current record's "vychozi_skupina_id" value
 * @method Setting setSkupinaHostId()          Sets the current record's "skupina_host_id" value
 * @method Setting setSkupinaVelId()           Sets the current record's "skupina_vel_id" value
 * @method Setting setIntervalTyp()            Sets the current record's "interval_typ" value
 * @method Setting setIntervalKontrolyMeny()   Sets the current record's "interval_kontroly_meny" value
 * @method Setting setMena()                   Sets the current record's "Mena" value
 * @method Setting setSkupinaVychozi()         Sets the current record's "SkupinaVychozi" value
 * @method Setting setSkupinaHost()            Sets the current record's "SkupinaHost" value
 * @method Setting setSkupinaVel()             Sets the current record's "SkupinaVel" value
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSetting extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('setting');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('SiteName', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('email', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('email2', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('tel', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('mobil', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('pracovni_doba', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('ulice', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('mesto', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('ga_code', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('google_overeni', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('hlavni_mena', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('vychozi_skupina_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('skupina_host_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('skupina_vel_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('interval_typ', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Hodina',
              1 => 'Den',
              2 => 'Mesic',
              3 => 'Rok',
             ),
             'default' => 'Den',
             ));
        $this->hasColumn('interval_kontroly_meny', 'integer', null, array(
             'type' => 'integer',
             'default' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Mena', array(
             'local' => 'hlavni_mena',
             'foreign' => 'id'));

        $this->hasOne('Skupina as SkupinaVychozi', array(
             'local' => 'vychozi_skupina_id',
             'foreign' => 'id'));

        $this->hasOne('Skupina as SkupinaHost', array(
             'local' => 'skupina_host_id',
             'foreign' => 'id'));

        $this->hasOne('Skupina as SkupinaVel', array(
             'local' => 'skupina_vel_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}