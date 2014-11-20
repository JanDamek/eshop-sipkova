<?php

/**
 * PayPal form base class.
 *
 * @method PayPal getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePayPalForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'requestUrl'     => new sfWidgetFormInputText(),
      'shopname'       => new sfWidgetFormInputText(),
      'creditaccount'  => new sfWidgetFormInputText(),
      'creditbank'     => new sfWidgetFormInputText(),
      'mena_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => false)),
      'zeme_urceni_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'), 'add_empty' => false)),
      'enabled'        => new sfWidgetFormInputCheckbox(),
      'img'            => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'requestUrl'     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'shopname'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'creditaccount'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'creditbank'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mena_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'))),
      'zeme_urceni_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'))),
      'enabled'        => new sfValidatorBoolean(array('required' => false)),
      'img'            => new sfValidatorString(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('pay_pal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PayPal';
  }

}
