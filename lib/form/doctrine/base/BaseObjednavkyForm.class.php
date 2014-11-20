<?php

/**
 * Objednavky form base class.
 *
 * @method Objednavky getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseObjednavkyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'typ'         => new sfWidgetFormChoice(array('choices' => array('Přijato' => 'Přijato', 'Odeslano' => 'Odeslano', 'Doruceno' => 'Doruceno', 'Stornováno' => 'Stornováno'))),
      'stav'        => new sfWidgetFormChoice(array('choices' => array('Nezaplaceno' => 'Nezaplaceno', 'Zaplaceno' => 'Zaplaceno'))),
      'zakaznik_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => false)),
      'doprava_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'), 'add_empty' => false)),
      'platba_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Platba'), 'add_empty' => false)),
      'pobocka_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PobockyDoprava'), 'add_empty' => true)),
      'sleva'       => new sfWidgetFormInputText(),
      'celkem_dopl' => new sfWidgetFormInputText(),
      'celkem'      => new sfWidgetFormInputText(),
      'mena_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => false)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'slug'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'typ'         => new sfValidatorChoice(array('choices' => array(0 => 'Přijato', 1 => 'Odeslano', 2 => 'Doruceno', 3 => 'Stornováno'), 'required' => false)),
      'stav'        => new sfValidatorChoice(array('choices' => array(0 => 'Nezaplaceno', 1 => 'Zaplaceno'), 'required' => false)),
      'zakaznik_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'))),
      'doprava_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'))),
      'platba_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Platba'))),
      'pobocka_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PobockyDoprava'), 'required' => false)),
      'sleva'       => new sfValidatorNumber(array('required' => false)),
      'celkem_dopl' => new sfValidatorNumber(array('required' => false)),
      'celkem'      => new sfValidatorNumber(array('required' => false)),
      'mena_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'))),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Objednavky', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('objednavky[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Objednavky';
  }

}
