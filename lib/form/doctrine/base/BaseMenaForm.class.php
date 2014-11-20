<?php

/**
 * Mena form base class.
 *
 * @method Mena getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMenaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'oznaceni'         => new sfWidgetFormInputText(),
      'kurz_url'         => new sfWidgetFormTextarea(),
      'last_auto_update' => new sfWidgetFormDateTime(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'slug'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'oznaceni'         => new sfValidatorString(array('max_length' => 10)),
      'kurz_url'         => new sfValidatorString(array('required' => false)),
      'last_auto_update' => new sfValidatorDateTime(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Mena', 'column' => array('oznaceni'))),
        new sfValidatorDoctrineUnique(array('model' => 'Mena', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('mena[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Mena';
  }

}
