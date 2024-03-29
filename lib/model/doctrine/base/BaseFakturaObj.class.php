<?php

/**
 * BaseFakturaObj
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Doctrine_Collection $Faktura
 * 
 * @method Doctrine_Collection getFaktura() Returns the current record's "Faktura" collection
 * @method FakturaObj          setFaktura() Sets the current record's "Faktura" collection
 * 
 * @package    E Shop
 * @subpackage model
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFakturaObj extends CisloObj
{
    public function setTableDefinition()
    {
        $this->setTableName('faktura_obj');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Faktura', array(
             'local' => 'id',
             'foreign' => 'faktura_obj_id'));
    }
}