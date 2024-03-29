<?php

/**
 * BaseZemeUrceni
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property Doctrine_Collection $WebPay
 * @property Doctrine_Collection $ePlatba
 * @property Doctrine_Collection $PayPal
 * @property Doctrine_Collection $Doprava
 * @property Doctrine_Collection $Zakaznik
 * 
 * @method integer             getId()       Returns the current record's "id" value
 * @method string              getName()     Returns the current record's "name" value
 * @method string              getTitle()    Returns the current record's "title" value
 * @method Doctrine_Collection getWebPay()   Returns the current record's "WebPay" collection
 * @method Doctrine_Collection getEPlatba()  Returns the current record's "ePlatba" collection
 * @method Doctrine_Collection getPayPal()   Returns the current record's "PayPal" collection
 * @method Doctrine_Collection getDoprava()  Returns the current record's "Doprava" collection
 * @method Doctrine_Collection getZakaznik() Returns the current record's "Zakaznik" collection
 * @method ZemeUrceni          setId()       Sets the current record's "id" value
 * @method ZemeUrceni          setName()     Sets the current record's "name" value
 * @method ZemeUrceni          setTitle()    Sets the current record's "title" value
 * @method ZemeUrceni          setWebPay()   Sets the current record's "WebPay" collection
 * @method ZemeUrceni          setEPlatba()  Sets the current record's "ePlatba" collection
 * @method ZemeUrceni          setPayPal()   Sets the current record's "PayPal" collection
 * @method ZemeUrceni          setDoprava()  Sets the current record's "Doprava" collection
 * @method ZemeUrceni          setZakaznik() Sets the current record's "Zakaznik" collection
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseZemeUrceni extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('zeme_urceni');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('title', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('WebPay', array(
             'local' => 'id',
             'foreign' => 'zeme_urceni_id'));

        $this->hasMany('ePlatba', array(
             'local' => 'id',
             'foreign' => 'zeme_urceni_id'));

        $this->hasMany('PayPal', array(
             'local' => 'id',
             'foreign' => 'zeme_urceni_id'));

        $this->hasMany('Doprava', array(
             'local' => 'id',
             'foreign' => 'zeme_urceni_id'));

        $this->hasMany('Zakaznik', array(
             'local' => 'id',
             'foreign' => 'dorucit_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'name',
             ),
             'canUpdate' => false,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}