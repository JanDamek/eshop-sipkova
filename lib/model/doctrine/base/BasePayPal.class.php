<?php

/**
 * BasePayPal
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $requestUrl
 * @property string $shopname
 * @property string $creditaccount
 * @property string $creditbank
 * @property integer $mena_id
 * @property integer $zeme_urceni_id
 * @property boolean $enabled
 * @property string $img
 * @property Mena $Mena
 * @property ZemeUrceni $ZemeUrceni
 * 
 * @method integer    getId()             Returns the current record's "id" value
 * @method string     getRequestUrl()     Returns the current record's "requestUrl" value
 * @method string     getShopname()       Returns the current record's "shopname" value
 * @method string     getCreditaccount()  Returns the current record's "creditaccount" value
 * @method string     getCreditbank()     Returns the current record's "creditbank" value
 * @method integer    getMenaId()         Returns the current record's "mena_id" value
 * @method integer    getZemeUrceniId()   Returns the current record's "zeme_urceni_id" value
 * @method boolean    getEnabled()        Returns the current record's "enabled" value
 * @method string     getImg()            Returns the current record's "img" value
 * @method Mena       getMena()           Returns the current record's "Mena" value
 * @method ZemeUrceni getZemeUrceni()     Returns the current record's "ZemeUrceni" value
 * @method PayPal     setId()             Sets the current record's "id" value
 * @method PayPal     setRequestUrl()     Sets the current record's "requestUrl" value
 * @method PayPal     setShopname()       Sets the current record's "shopname" value
 * @method PayPal     setCreditaccount()  Sets the current record's "creditaccount" value
 * @method PayPal     setCreditbank()     Sets the current record's "creditbank" value
 * @method PayPal     setMenaId()         Sets the current record's "mena_id" value
 * @method PayPal     setZemeUrceniId()   Sets the current record's "zeme_urceni_id" value
 * @method PayPal     setEnabled()        Sets the current record's "enabled" value
 * @method PayPal     setImg()            Sets the current record's "img" value
 * @method PayPal     setMena()           Sets the current record's "Mena" value
 * @method PayPal     setZemeUrceni()     Sets the current record's "ZemeUrceni" value
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePayPal extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pay_pal');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('requestUrl', 'string', 250, array(
             'type' => 'string',
             'default' => 'https://ibs.rb.cz/RZBOP32/ControllerServlet',
             'length' => 250,
             ));
        $this->hasColumn('shopname', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('creditaccount', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('creditbank', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('mena_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('zeme_urceni_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('enabled', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('img', 'string', null, array(
             'type' => 'string',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Mena', array(
             'local' => 'mena_id',
             'foreign' => 'id'));

        $this->hasOne('ZemeUrceni', array(
             'local' => 'zeme_urceni_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}