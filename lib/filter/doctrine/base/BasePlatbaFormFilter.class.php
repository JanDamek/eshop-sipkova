<?php

/**
 * Platba filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePlatbaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'         => new sfWidgetFormFilterInput(),
      'mena_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'doprava_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'), 'add_empty' => true)),
      'celkem'        => new sfWidgetFormFilterInput(),
      'cena'          => new sfWidgetFormFilterInput(),
      'system_platby' => new sfWidgetFormChoice(array('choices' => array('' => '', 'OffLine' => 'OffLine', 'OnLine' => 'OnLine'))),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'title'         => new sfValidatorPass(array('required' => false)),
      'mena_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'doprava_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Doprava'), 'column' => 'doprava_id')),
      'celkem'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cena'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'system_platby' => new sfValidatorChoice(array('required' => false, 'choices' => array('OffLine' => 'OffLine', 'OnLine' => 'OnLine'))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('platba_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Platba';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'title'         => 'Text',
      'mena_id'       => 'ForeignKey',
      'doprava_id'    => 'ForeignKey',
      'celkem'        => 'Number',
      'cena'          => 'Number',
      'system_platby' => 'Enum',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'slug'          => 'Text',
    );
  }
}
