<?php

/**
 * Slozeni form base class.
 *
 * @method Slozeni getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSlozeniForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'slozeni_id'  => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'perex'       => new sfWidgetFormTextarea(),
      'perex_img'   => new sfWidgetFormTextarea(),
      'img'         => new sfWidgetFormTextarea(),
      'popis'       => new sfWidgetFormTextarea(),
      'enabled'     => new sfWidgetFormInputCheckbox(),
      'keywords'    => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'slug'        => new sfWidgetFormInputText(),
      'zbozi_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Zbozi')),
    ));

    $this->setValidators(array(
      'slozeni_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('slozeni_id')), 'empty_value' => $this->getObject()->get('slozeni_id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50)),
      'title'       => new sfValidatorString(array('max_length' => 50)),
      'perex'       => new sfValidatorString(array('required' => false)),
      'perex_img'   => new sfValidatorString(array('required' => false)),
      'img'         => new sfValidatorString(array('required' => false)),
      'popis'       => new sfValidatorString(array('required' => false)),
      'enabled'     => new sfValidatorBoolean(array('required' => false)),
      'keywords'    => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('max_length' => 255)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'zbozi_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Zbozi', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Slozeni', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Slozeni', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('slozeni[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slozeni';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['zbozi_list']))
    {
      $this->setDefault('zbozi_list', $this->object->Zbozi->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveZboziList($con);

    parent::doSave($con);
  }

  public function saveZboziList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['zbozi_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Zbozi->getPrimaryKeys();
    $values = $this->getValue('zbozi_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Zbozi', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Zbozi', array_values($link));
    }
  }

}
