<?php

/**
 * StavObjednavkyTranslation filter form base class.
 *
 * @package    Sipkova E Shop
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStavObjednavkyTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'popis' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title' => new sfValidatorPass(array('required' => false)),
      'popis' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('stav_objednavky_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StavObjednavkyTranslation';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'title' => 'Text',
      'popis' => 'Text',
      'lang'  => 'Text',
    );
  }
}
