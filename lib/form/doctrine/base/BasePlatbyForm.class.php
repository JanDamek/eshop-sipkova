<?php

/**
 * Platby form base class.
 *
 * @method Platby getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePlatbyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'stav'        => new sfWidgetFormChoice(array('choices' => array('V procesu' => 'V procesu', 'Zamitnuto' => 'Zamitnuto', 'Zaplaceno' => 'Zaplaceno'))),
      'zakaznik_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => false)),
      'doprava_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'), 'add_empty' => false)),
      'platba_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Platba'), 'add_empty' => false)),
      'pobocka_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PobockyDoprava'), 'add_empty' => true)),
      'celkem'      => new sfWidgetFormInputText(),
      'mena_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => false)),
      'obj_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objednavky'), 'add_empty' => false)),
      'hash'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'slug'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'stav'        => new sfValidatorChoice(array('choices' => array(0 => 'V procesu', 1 => 'Zamitnuto', 2 => 'Zaplaceno'), 'required' => false)),
      'zakaznik_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'))),
      'doprava_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'))),
      'platba_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Platba'))),
      'pobocka_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PobockyDoprava'), 'required' => false)),
      'celkem'      => new sfValidatorNumber(array('required' => false)),
      'mena_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'))),
      'obj_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Objednavky'))),
      'hash'        => new sfValidatorString(array('max_length' => 32)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Platby', 'column' => array('hash'))),
        new sfValidatorDoctrineUnique(array('model' => 'Platby', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('platby[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Platby';
  }

}
