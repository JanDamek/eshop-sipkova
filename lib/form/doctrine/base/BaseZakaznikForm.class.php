<?php

/**
 * Zakaznik form base class.
 *
 * @method Zakaznik getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZakaznikForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'username'       => new sfWidgetFormInputText(),
      'email'          => new sfWidgetFormInputText(),
      'password'       => new sfWidgetFormInputText(),
      'skupina_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Skupina'), 'add_empty' => true)),
      'mena_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'jmeno'          => new sfWidgetFormInputText(),
      'prijmeni'       => new sfWidgetFormInputText(),
      'organizace'     => new sfWidgetFormInputText(),
      'ulice'          => new sfWidgetFormInputText(),
      'psc'            => new sfWidgetFormInputText(),
      'mesto'          => new sfWidgetFormInputText(),
      'dorucit_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'), 'add_empty' => true)),
      'ico'            => new sfWidgetFormInputText(),
      'jmeno_ico'      => new sfWidgetFormInputText(),
      'prijmeni_ico'   => new sfWidgetFormInputText(),
      'organizace_ico' => new sfWidgetFormInputText(),
      'ulice_ico'      => new sfWidgetFormInputText(),
      'psc_ico'        => new sfWidgetFormInputText(),
      'mesto_ico'      => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'slug'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'       => new sfValidatorString(array('max_length' => 50)),
      'email'          => new sfValidatorString(array('max_length' => 255)),
      'password'       => new sfValidatorString(array('max_length' => 128)),
      'skupina_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Skupina'), 'required' => false)),
      'mena_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'required' => false)),
      'jmeno'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'prijmeni'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'organizace'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ulice'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'psc'            => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'mesto'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'dorucit_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'), 'required' => false)),
      'ico'            => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'jmeno_ico'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'prijmeni_ico'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'organizace_ico' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ulice_ico'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'psc_ico'        => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'mesto_ico'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'slug'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Zakaznik', 'column' => array('username'))),
        new sfValidatorDoctrineUnique(array('model' => 'Zakaznik', 'column' => array('email'))),
        new sfValidatorDoctrineUnique(array('model' => 'Zakaznik', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('zakaznik[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zakaznik';
  }

}
