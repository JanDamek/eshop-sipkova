<?php

/**
 * PayPal filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePayPalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'requestUrl'     => new sfWidgetFormFilterInput(),
      'shopname'       => new sfWidgetFormFilterInput(),
      'creditaccount'  => new sfWidgetFormFilterInput(),
      'creditbank'     => new sfWidgetFormFilterInput(),
      'mena_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'zeme_urceni_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'), 'add_empty' => true)),
      'enabled'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'img'            => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'requestUrl'     => new sfValidatorPass(array('required' => false)),
      'shopname'       => new sfValidatorPass(array('required' => false)),
      'creditaccount'  => new sfValidatorPass(array('required' => false)),
      'creditbank'     => new sfValidatorPass(array('required' => false)),
      'mena_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'zeme_urceni_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ZemeUrceni'), 'column' => 'id')),
      'enabled'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'img'            => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('pay_pal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PayPal';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'requestUrl'     => 'Text',
      'shopname'       => 'Text',
      'creditaccount'  => 'Text',
      'creditbank'     => 'Text',
      'mena_id'        => 'ForeignKey',
      'zeme_urceni_id' => 'ForeignKey',
      'enabled'        => 'Boolean',
      'img'            => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
