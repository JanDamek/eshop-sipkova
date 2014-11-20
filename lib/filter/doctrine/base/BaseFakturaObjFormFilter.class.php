<?php

/**
 * FakturaObj filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFakturaObjFormFilter extends CisloObjFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('faktura_obj_filters[%s]');
  }

  public function getModelName()
  {
    return 'FakturaObj';
  }
}
