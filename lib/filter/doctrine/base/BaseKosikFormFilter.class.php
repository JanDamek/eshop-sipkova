<?php

/**
 * Kosik filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseKosikFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'session_id'  => new sfWidgetFormFilterInput(),
      'zakaznik_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => true)),
      'zbozi_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'add_empty' => true)),
      'mena_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'mno'         => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'session_id'  => new sfValidatorPass(array('required' => false)),
      'zakaznik_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zakaznik'), 'column' => 'id')),
      'zbozi_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zbozi'), 'column' => 'zbozi_id')),
      'mena_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'mno'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('kosik_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Kosik';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'session_id'  => 'Text',
      'zakaznik_id' => 'ForeignKey',
      'zbozi_id'    => 'ForeignKey',
      'mena_id'     => 'ForeignKey',
      'mno'         => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
