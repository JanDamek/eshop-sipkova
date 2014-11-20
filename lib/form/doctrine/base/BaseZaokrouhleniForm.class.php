<?php

/**
 * Zaokrouhleni form base class.
 *
 * @method Zaokrouhleni getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZaokrouhleniForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'name'   => new sfWidgetFormInputText(),
      'metoda' => new sfWidgetFormChoice(array('choices' => array(1 => '1', '0.01' => '0.01', '0.05' => '0.05', '0.1' => '0.1', '0.5' => '0.5'))),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'metoda' => new sfValidatorChoice(array('choices' => array(0 => '1', 1 => '0.01', 2 => '0.05', 3 => '0.1', 4 => '0.5'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zaokrouhleni[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zaokrouhleni';
  }

}
