<?php

/**
 * GalleryImageTranslation filter form base class.
 *
 * @package    Sipkova E Shop
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGalleryImageTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'alt'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'alt'   => new sfValidatorPass(array('required' => false)),
      'title' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gallery_image_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GalleryImageTranslation';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'alt'   => 'Text',
      'title' => 'Text',
      'lang'  => 'Text',
    );
  }
}
