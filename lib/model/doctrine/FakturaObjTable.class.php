<?php

/**
 * FakturaObjTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FakturaObjTable extends CisloObjTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object FakturaObjTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('FakturaObj');
    }
}