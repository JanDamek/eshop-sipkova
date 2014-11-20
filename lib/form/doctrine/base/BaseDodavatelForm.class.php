<?php

/**
 * Dodavatel form base class.
 *
 * @method Dodavatel getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDodavatelForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'mena_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'jmeno'      => new sfWidgetFormInputText(),
      'prijmeni'   => new sfWidgetFormInputText(),
      'organizace' => new sfWidgetFormInputText(),
      'ulice'      => new sfWidgetFormInputText(),
      'psc'        => new sfWidgetFormInputText(),
      'mesto'      => new sfWidgetFormInputText(),
      'ico'        => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mena_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'required' => false)),
      'jmeno'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'prijmeni'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'organizace' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ulice'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'psc'        => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'mesto'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ico'        => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Dodavatel', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('dodavatel[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dodavatel';
  }

}
