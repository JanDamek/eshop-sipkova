<?php

/**
 * PolozkyFak form base class.
 *
 * @method PolozkyFak getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePolozkyFakForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'faktura_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faktura'), 'add_empty' => false)),
      'zbozi_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'add_empty' => true)),
      'mno'        => new sfWidgetFormInputText(),
      'cena'       => new sfWidgetFormInputText(),
      'sleva'      => new sfWidgetFormInputText(),
      'mena_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'faktura_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Faktura'))),
      'zbozi_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'required' => false)),
      'mno'        => new sfValidatorNumber(array('required' => false)),
      'cena'       => new sfValidatorNumber(array('required' => false)),
      'sleva'      => new sfValidatorNumber(array('required' => false)),
      'mena_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'PolozkyFak', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('polozky_fak[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PolozkyFak';
  }

}
