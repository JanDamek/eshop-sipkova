<?php

/**
 * Platba form base class.
 *
 * @method Platba getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePlatbaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'title'         => new sfWidgetFormInputText(),
      'mena_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => false)),
      'doprava_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'), 'add_empty' => false)),
      'celkem'        => new sfWidgetFormInputText(),
      'cena'          => new sfWidgetFormInputText(),
      'system_platby' => new sfWidgetFormChoice(array('choices' => array('OffLine' => 'OffLine', 'OnLine' => 'OnLine'))),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'slug'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 50)),
      'title'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mena_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'))),
      'doprava_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'))),
      'celkem'        => new sfValidatorNumber(array('required' => false)),
      'cena'          => new sfValidatorNumber(array('required' => false)),
      'system_platby' => new sfValidatorChoice(array('choices' => array(0 => 'OffLine', 1 => 'OnLine'), 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Platba', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('platba[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Platba';
  }

}
