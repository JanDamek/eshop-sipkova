<?php

/**
 * StrankyTranslation filter form base class.
 *
 * @package    Sipkova E Shop
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStrankyTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'popis'       => new sfWidgetFormFilterInput(),
      'keywords'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'title'       => new sfValidatorPass(array('required' => false)),
      'popis'       => new sfValidatorPass(array('required' => false)),
      'keywords'    => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('stranky_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StrankyTranslation';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'title'       => 'Text',
      'popis'       => 'Text',
      'keywords'    => 'Text',
      'description' => 'Text',
      'lang'        => 'Text',
    );
  }
}
