<?php

/**
 * Stranky form base class.
 *
 * @method Stranky getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStrankyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'kategorie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kategorie'), 'add_empty' => true)),
      'name'         => new sfWidgetFormInputText(),
      'title'        => new sfWidgetFormInputText(),
      'gallery_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'perex'        => new sfWidgetFormTextarea(),
      'popis'        => new sfWidgetFormTextarea(),
      'enabled'      => new sfWidgetFormInputCheckbox(),
      'is_homepage'  => new sfWidgetFormInputCheckbox(),
      'keywords'     => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'slug'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'kategorie_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Kategorie'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 50)),
      'title'        => new sfValidatorString(array('max_length' => 50)),
      'gallery_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'required' => false)),
      'perex'        => new sfValidatorString(array('required' => false)),
      'popis'        => new sfValidatorString(array('required' => false)),
      'enabled'      => new sfValidatorBoolean(array('required' => false)),
      'is_homepage'  => new sfValidatorBoolean(array('required' => false)),
      'keywords'     => new sfValidatorString(array('max_length' => 255)),
      'description'  => new sfValidatorString(array('max_length' => 255)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'slug'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Stranky', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Stranky', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('stranky[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stranky';
  }

}
