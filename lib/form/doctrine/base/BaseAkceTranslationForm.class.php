<?php

/**
 * AkceTranslation form base class.
 *
 * @method AkceTranslation getObject() Returns the current form's model object
 *
 * @package    Sipkova E Shop
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAkceTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'title'       => new sfWidgetFormInputText(),
      'perex'       => new sfWidgetFormTextarea(),
      'keywords'    => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'popis'       => new sfWidgetFormTextarea(),
      'lang'        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 50)),
      'perex'       => new sfValidatorString(array('required' => false)),
      'keywords'    => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('max_length' => 255)),
      'popis'       => new sfValidatorString(array('required' => false)),
      'lang'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('akce_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AkceTranslation';
  }

}
