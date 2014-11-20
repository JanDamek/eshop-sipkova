<?php

/**
 * Gallery form base class.
 *
 * @method Gallery getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGalleryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'title'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'keywords'    => new sfWidgetFormInputText(),
      'path'        => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'slug'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 100)),
      'description' => new sfValidatorString(array('max_length' => 255)),
      'keywords'    => new sfValidatorString(array('max_length' => 255)),
      'path'        => new sfValidatorString(array('max_length' => 255)),
      'is_active'   => new sfValidatorBoolean(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gallery[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gallery';
  }

}
