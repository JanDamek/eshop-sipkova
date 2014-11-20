<?php

/**
 * PobockyDoprava form base class.
 *
 * @method PobockyDoprava getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePobockyDopravaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pobocka_id'    => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'mena_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => false)),
      'title'         => new sfWidgetFormInputText(),
      'celkem'        => new sfWidgetFormInputText(),
      'cena'          => new sfWidgetFormInputText(),
      'adresa'        => new sfWidgetFormTextarea(),
      'provozni_doba' => new sfWidgetFormTextarea(),
      'mapa_adresa'   => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'slug'          => new sfWidgetFormInputText(),
      'doprava_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Doprava')),
    ));

    $this->setValidators(array(
      'pobocka_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('pobocka_id')), 'empty_value' => $this->getObject()->get('pobocka_id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 50)),
      'mena_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'))),
      'title'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'celkem'        => new sfValidatorNumber(array('required' => false)),
      'cena'          => new sfValidatorNumber(array('required' => false)),
      'adresa'        => new sfValidatorString(array('required' => false)),
      'provozni_doba' => new sfValidatorString(array('required' => false)),
      'mapa_adresa'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'doprava_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Doprava', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'PobockyDoprava', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('pobocky_doprava[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PobockyDoprava';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['doprava_list']))
    {
      $this->setDefault('doprava_list', $this->object->Doprava->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveDopravaList($con);

    parent::doSave($con);
  }

  public function saveDopravaList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['doprava_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Doprava->getPrimaryKeys();
    $values = $this->getValue('doprava_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Doprava', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Doprava', array_values($link));
    }
  }

}
