<?php

/**
 * ObjednavkyUkoncene form base class.
 *
 * @method ObjednavkyUkoncene getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseObjednavkyUkonceneForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'cislo_obj_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CisloObj'), 'add_empty' => false)),
      'stav_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('StavObjednavky'), 'add_empty' => false)),
      'zakaznik_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => false)),
      'faktura_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faktura'), 'add_empty' => true)),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'slug'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cislo_obj_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CisloObj'))),
      'stav_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('StavObjednavky'))),
      'zakaznik_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'))),
      'faktura_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Faktura'), 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'slug'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ObjednavkyUkoncene', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('objednavky_ukoncene[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObjednavkyUkoncene';
  }

}
