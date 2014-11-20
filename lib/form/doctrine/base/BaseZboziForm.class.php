<?php

/**
 * Zbozi form base class.
 *
 * @method Zbozi getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZboziForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'zbozi_id'     => new sfWidgetFormInputHidden(),
      'kategorie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kategorie'), 'add_empty' => true)),
      'name'         => new sfWidgetFormInputText(),
      'title'        => new sfWidgetFormInputText(),
      'perex'        => new sfWidgetFormTextarea(),
      'perex_img'    => new sfWidgetFormTextarea(),
      'nazev_img'    => new sfWidgetFormTextarea(),
      'baleni'       => new sfWidgetFormInputText(),
      'enabled'      => new sfWidgetFormInputCheckbox(),
      'gallery_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'keywords'     => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormInputText(),
      'cena'         => new sfWidgetFormInputText(),
      'dph_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DPH'), 'add_empty' => true)),
      'mena_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'popis'        => new sfWidgetFormTextarea(),
      'skladem'      => new sfWidgetFormInputText(),
      'min_mno'      => new sfWidgetFormInputText(),
      'dodavatel_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dodavatel'), 'add_empty' => true)),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'slug'         => new sfWidgetFormInputText(),
      'slozeni_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Slozeni')),
    ));

    $this->setValidators(array(
      'zbozi_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('zbozi_id')), 'empty_value' => $this->getObject()->get('zbozi_id'), 'required' => false)),
      'kategorie_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Kategorie'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 50)),
      'title'        => new sfValidatorString(array('max_length' => 50)),
      'perex'        => new sfValidatorString(array('required' => false)),
      'perex_img'    => new sfValidatorString(array('required' => false)),
      'nazev_img'    => new sfValidatorString(array('required' => false)),
      'baleni'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'enabled'      => new sfValidatorBoolean(array('required' => false)),
      'gallery_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'required' => false)),
      'keywords'     => new sfValidatorString(array('max_length' => 255)),
      'description'  => new sfValidatorString(array('max_length' => 255)),
      'cena'         => new sfValidatorNumber(array('required' => false)),
      'dph_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DPH'), 'required' => false)),
      'mena_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'required' => false)),
      'popis'        => new sfValidatorString(array('required' => false)),
      'skladem'      => new sfValidatorNumber(array('required' => false)),
      'min_mno'      => new sfValidatorNumber(array('required' => false)),
      'dodavatel_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Dodavatel'), 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'slug'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'slozeni_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Slozeni', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Zbozi', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Zbozi', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('zbozi[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zbozi';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['slozeni_list']))
    {
      $this->setDefault('slozeni_list', $this->object->Slozeni->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveSlozeniList($con);

    parent::doSave($con);
  }

  public function saveSlozeniList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['slozeni_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Slozeni->getPrimaryKeys();
    $values = $this->getValue('slozeni_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Slozeni', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Slozeni', array_values($link));
    }
  }

}
