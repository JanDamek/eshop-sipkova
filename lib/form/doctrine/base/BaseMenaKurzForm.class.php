<?php

/**
 * MenaKurz form base class.
 *
 * @method MenaKurz getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMenaKurzForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'vychozi_mena' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Vychozi'), 'add_empty' => true)),
      'cilova_mena'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cilova'), 'add_empty' => true)),
      'kurz'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'vychozi_mena' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Vychozi'), 'required' => false)),
      'cilova_mena'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cilova'), 'required' => false)),
      'kurz'         => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mena_kurz[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenaKurz';
  }

}
