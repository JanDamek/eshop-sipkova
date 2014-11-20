<?php

/**
 * Platby filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePlatbyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'stav'        => new sfWidgetFormChoice(array('choices' => array('' => '', 'V procesu' => 'V procesu', 'Zamitnuto' => 'Zamitnuto', 'Zaplaceno' => 'Zaplaceno'))),
      'zakaznik_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => true)),
      'doprava_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'), 'add_empty' => true)),
      'platba_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Platba'), 'add_empty' => true)),
      'pobocka_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PobockyDoprava'), 'add_empty' => true)),
      'celkem'      => new sfWidgetFormFilterInput(),
      'mena_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'obj_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objednavky'), 'add_empty' => true)),
      'hash'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'stav'        => new sfValidatorChoice(array('required' => false, 'choices' => array('V procesu' => 'V procesu', 'Zamitnuto' => 'Zamitnuto', 'Zaplaceno' => 'Zaplaceno'))),
      'zakaznik_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zakaznik'), 'column' => 'id')),
      'doprava_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Doprava'), 'column' => 'doprava_id')),
      'platba_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Platba'), 'column' => 'id')),
      'pobocka_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PobockyDoprava'), 'column' => 'pobocka_id')),
      'celkem'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mena_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'obj_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Objednavky'), 'column' => 'id')),
      'hash'        => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('platby_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Platby';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'stav'        => 'Enum',
      'zakaznik_id' => 'ForeignKey',
      'doprava_id'  => 'ForeignKey',
      'platba_id'   => 'ForeignKey',
      'pobocka_id'  => 'ForeignKey',
      'celkem'      => 'Number',
      'mena_id'     => 'ForeignKey',
      'obj_id'      => 'ForeignKey',
      'hash'        => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'slug'        => 'Text',
    );
  }
}
