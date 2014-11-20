<?php

/**
 * GalleryTranslation filter form base class.
 *
 * @package    Sipkova E Shop
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGalleryTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'keywords'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'description' => new sfValidatorPass(array('required' => false)),
      'keywords'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gallery_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GalleryTranslation';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'description' => 'Text',
      'keywords'    => 'Text',
      'lang'        => 'Text',
    );
  }
}
