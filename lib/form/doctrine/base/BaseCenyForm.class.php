<?php

/**
 * Ceny form base class.
 *
 * @method Ceny getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCenyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'zbozi_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'add_empty' => false)),
      'skupina_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Skupina'), 'add_empty' => true)),
      'zakaznik_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => true)),
      'typ'         => new sfWidgetFormChoice(array('choices' => array('Cena' => 'Cena', 'Sleva' => 'Sleva'))),
      'dle'         => new sfWidgetFormChoice(array('choices' => array('Skupina' => 'Skupina', 'Zakaznik' => 'Zakaznik'))),
      'cena'        => new sfWidgetFormInputText(),
      'mena_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'typ_slevy'   => new sfWidgetFormChoice(array('choices' => array('Cena' => 'Cena', 'Procenta' => 'Procenta'))),
      'sleva'       => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'zbozi_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'))),
      'skupina_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Skupina'), 'required' => false)),
      'zakaznik_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'required' => false)),
      'typ'         => new sfValidatorChoice(array('choices' => array(0 => 'Cena', 1 => 'Sleva'), 'required' => false)),
      'dle'         => new sfValidatorChoice(array('choices' => array(0 => 'Skupina', 1 => 'Zakaznik'), 'required' => false)),
      'cena'        => new sfValidatorNumber(array('required' => false)),
      'mena_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'required' => false)),
      'typ_slevy'   => new sfValidatorChoice(array('choices' => array(0 => 'Cena', 1 => 'Procenta'), 'required' => false)),
      'sleva'       => new sfValidatorNumber(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ceny[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ceny';
  }

}
