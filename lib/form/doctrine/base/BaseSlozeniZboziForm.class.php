<?php

/**
 * SlozeniZbozi form base class.
 *
 * @method SlozeniZbozi getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSlozeniZboziForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'slozeni_id' => new sfWidgetFormInputHidden(),
      'zbozi_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'slozeni_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('slozeni_id')), 'empty_value' => $this->getObject()->get('slozeni_id'), 'required' => false)),
      'zbozi_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('zbozi_id')), 'empty_value' => $this->getObject()->get('zbozi_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('slozeni_zbozi[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SlozeniZbozi';
  }

}
