<?php

/**
 * Ceny filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCenyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'zbozi_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'add_empty' => true)),
      'skupina_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Skupina'), 'add_empty' => true)),
      'zakaznik_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => true)),
      'typ'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'Cena' => 'Cena', 'Sleva' => 'Sleva'))),
      'dle'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'Skupina' => 'Skupina', 'Zakaznik' => 'Zakaznik'))),
      'cena'        => new sfWidgetFormFilterInput(),
      'mena_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'typ_slevy'   => new sfWidgetFormChoice(array('choices' => array('' => '', 'Cena' => 'Cena', 'Procenta' => 'Procenta'))),
      'sleva'       => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'zbozi_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zbozi'), 'column' => 'zbozi_id')),
      'skupina_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Skupina'), 'column' => 'id')),
      'zakaznik_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zakaznik'), 'column' => 'id')),
      'typ'         => new sfValidatorChoice(array('required' => false, 'choices' => array('Cena' => 'Cena', 'Sleva' => 'Sleva'))),
      'dle'         => new sfValidatorChoice(array('required' => false, 'choices' => array('Skupina' => 'Skupina', 'Zakaznik' => 'Zakaznik'))),
      'cena'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mena_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'typ_slevy'   => new sfValidatorChoice(array('required' => false, 'choices' => array('Cena' => 'Cena', 'Procenta' => 'Procenta'))),
      'sleva'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ceny_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ceny';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'zbozi_id'    => 'ForeignKey',
      'skupina_id'  => 'ForeignKey',
      'zakaznik_id' => 'ForeignKey',
      'typ'         => 'Enum',
      'dle'         => 'Enum',
      'cena'        => 'Number',
      'mena_id'     => 'ForeignKey',
      'typ_slevy'   => 'Enum',
      'sleva'       => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
