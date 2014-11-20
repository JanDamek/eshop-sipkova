<?php

/**
 * Setting form base class.
 *
 * @method Setting getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSettingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'SiteName'               => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'email2'                 => new sfWidgetFormInputText(),
      'tel'                    => new sfWidgetFormInputText(),
      'mobil'                  => new sfWidgetFormInputText(),
      'pracovni_doba'          => new sfWidgetFormTextarea(),
      'ulice'                  => new sfWidgetFormInputText(),
      'mesto'                  => new sfWidgetFormInputText(),
      'ga_code'                => new sfWidgetFormInputText(),
      'google_overeni'         => new sfWidgetFormInputText(),
      'hlavni_mena'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'vychozi_skupina_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SkupinaVychozi'), 'add_empty' => false)),
      'skupina_host_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SkupinaHost'), 'add_empty' => false)),
      'skupina_vel_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SkupinaVel'), 'add_empty' => false)),
      'interval_typ'           => new sfWidgetFormChoice(array('choices' => array('Hodina' => 'Hodina', 'Den' => 'Den', 'Mesic' => 'Mesic', 'Rok' => 'Rok'))),
      'interval_kontroly_meny' => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'SiteName'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email2'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'tel'                    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mobil'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pracovni_doba'          => new sfValidatorString(array('required' => false)),
      'ulice'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'mesto'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'ga_code'                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'google_overeni'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'hlavni_mena'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'required' => false)),
      'vychozi_skupina_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SkupinaVychozi'))),
      'skupina_host_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SkupinaHost'))),
      'skupina_vel_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SkupinaVel'))),
      'interval_typ'           => new sfValidatorChoice(array('choices' => array(0 => 'Hodina', 1 => 'Den', 2 => 'Mesic', 3 => 'Rok'), 'required' => false)),
      'interval_kontroly_meny' => new sfValidatorInteger(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('setting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Setting';
  }

}
