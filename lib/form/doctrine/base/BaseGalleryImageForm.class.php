<?php

/**
 * GalleryImage form base class.
 *
 * @method GalleryImage getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGalleryImageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'gallery_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => false)),
      'is_active'  => new sfWidgetFormInputCheckbox(),
      'path'       => new sfWidgetFormInputText(),
      'alt'        => new sfWidgetFormInputText(),
      'title'      => new sfWidgetFormInputText(),
      'ord'        => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'gallery_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'))),
      'is_active'  => new sfValidatorBoolean(array('required' => false)),
      'path'       => new sfValidatorString(array('max_length' => 255)),
      'alt'        => new sfValidatorString(array('max_length' => 60)),
      'title'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'ord'        => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('gallery_image[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GalleryImage';
  }

}
