<?php

/**
 * Faktura form base class.
 *
 * @method Faktura getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFakturaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'faktura_obj_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FakturaObj'), 'add_empty' => false)),
      'stav'           => new sfWidgetFormChoice(array('choices' => array('Vystaveno' => 'Vystaveno', 'Splatno' => 'Splatno', 'Proplaceno' => 'Proplaceno', 'Stornováno' => 'Stornováno'))),
      'sleva'          => new sfWidgetFormInputText(),
      'celkem_dopl'    => new sfWidgetFormInputText(),
      'celkem'         => new sfWidgetFormInputText(),
      'mena_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'zakaznik_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => false)),
      'objednavka_id'  => new sfWidgetFormInputText(),
      'doprava_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'), 'add_empty' => true)),
      'platba_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Platba'), 'add_empty' => true)),
      'pobocka_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PobockyDoprava'), 'add_empty' => true)),
      'splatnost'      => new sfWidgetFormDate(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'slug'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'faktura_obj_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('FakturaObj'))),
      'stav'           => new sfValidatorChoice(array('choices' => array(0 => 'Vystaveno', 1 => 'Splatno', 2 => 'Proplaceno', 3 => 'Stornováno'), 'required' => false)),
      'sleva'          => new sfValidatorNumber(array('required' => false)),
      'celkem_dopl'    => new sfValidatorNumber(array('required' => false)),
      'celkem'         => new sfValidatorNumber(array('required' => false)),
      'mena_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'required' => false)),
      'zakaznik_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'))),
      'objednavka_id'  => new sfValidatorInteger(array('required' => false)),
      'doprava_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'), 'required' => false)),
      'platba_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Platba'), 'required' => false)),
      'pobocka_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PobockyDoprava'), 'required' => false)),
      'splatnost'      => new sfValidatorDate(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'slug'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Faktura', 'column' => array('faktura_obj_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'Faktura', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('faktura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faktura';
  }

}
