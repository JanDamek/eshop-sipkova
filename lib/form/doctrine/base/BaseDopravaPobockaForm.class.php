<?php

/**
 * DopravaPobocka form base class.
 *
 * @method DopravaPobocka getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDopravaPobockaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'doprava_id' => new sfWidgetFormInputHidden(),
      'pobocka_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'doprava_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('doprava_id')), 'empty_value' => $this->getObject()->get('doprava_id'), 'required' => false)),
      'pobocka_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('pobocka_id')), 'empty_value' => $this->getObject()->get('pobocka_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('doprava_pobocka[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DopravaPobocka';
  }

}
