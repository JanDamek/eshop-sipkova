<?php

/**
 * MenaTranslation filter form base class.
 *
 * @package    Sipkova E Shop
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMenaTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'oznaceni' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'oznaceni' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mena_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenaTranslation';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'oznaceni' => 'Text',
      'lang'     => 'Text',
    );
  }
}
