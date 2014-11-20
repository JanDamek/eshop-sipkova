<?php

/**
 * FakturaObj form base class.
 *
 * @method FakturaObj getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFakturaObjForm extends CisloObjForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('faktura_obj[%s]');
  }

  public function getModelName()
  {
    return 'FakturaObj';
  }

}
