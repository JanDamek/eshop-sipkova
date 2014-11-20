<?php

/**
 * PolozkyFak filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePolozkyFakFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'faktura_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faktura'), 'add_empty' => true)),
      'zbozi_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'add_empty' => true)),
      'mno'        => new sfWidgetFormFilterInput(),
      'cena'       => new sfWidgetFormFilterInput(),
      'sleva'      => new sfWidgetFormFilterInput(),
      'mena_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'faktura_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Faktura'), 'column' => 'id')),
      'zbozi_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zbozi'), 'column' => 'zbozi_id')),
      'mno'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cena'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'sleva'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mena_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('polozky_fak_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PolozkyFak';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'faktura_id' => 'ForeignKey',
      'zbozi_id'   => 'ForeignKey',
      'mno'        => 'Number',
      'cena'       => 'Number',
      'sleva'      => 'Number',
      'mena_id'    => 'ForeignKey',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'slug'       => 'Text',
    );
  }
}
