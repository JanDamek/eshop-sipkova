<?php

/**
 * Doprava form base class.
 *
 * @method Doprava getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDopravaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'doprava_id'           => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'zeme_urceni_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'), 'add_empty' => false)),
      'mena_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => false)),
      'title'                => new sfWidgetFormInputText(),
      'celkem'               => new sfWidgetFormInputText(),
      'cena'                 => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'slug'                 => new sfWidgetFormInputText(),
      'pobocky_doprava_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PobockyDoprava')),
    ));

    $this->setValidators(array(
      'doprava_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('doprava_id')), 'empty_value' => $this->getObject()->get('doprava_id'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 50)),
      'zeme_urceni_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'))),
      'mena_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'))),
      'title'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'celkem'               => new sfValidatorNumber(array('required' => false)),
      'cena'                 => new sfValidatorNumber(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'slug'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'pobocky_doprava_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PobockyDoprava', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Doprava', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('doprava[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Doprava';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['pobocky_doprava_list']))
    {
      $this->setDefault('pobocky_doprava_list', $this->object->PobockyDoprava->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savePobockyDopravaList($con);

    parent::doSave($con);
  }

  public function savePobockyDopravaList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['pobocky_doprava_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->PobockyDoprava->getPrimaryKeys();
    $values = $this->getValue('pobocky_doprava_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('PobockyDoprava', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('PobockyDoprava', array_values($link));
    }
  }

}
