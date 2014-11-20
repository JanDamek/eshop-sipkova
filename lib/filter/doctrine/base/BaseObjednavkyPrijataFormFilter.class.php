<?php

/**
 * ObjednavkyPrijata filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseObjednavkyPrijataFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cislo_obj_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CisloObj'), 'add_empty' => true)),
      'stav_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('StavObjednavky'), 'add_empty' => true)),
      'zakaznik_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => true)),
      'faktura_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Faktura'), 'add_empty' => true)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cislo_obj_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CisloObj'), 'column' => 'id')),
      'stav_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('StavObjednavky'), 'column' => 'id')),
      'zakaznik_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zakaznik'), 'column' => 'id')),
      'faktura_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Faktura'), 'column' => 'id')),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('objednavky_prijata_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObjednavkyPrijata';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'cislo_obj_id' => 'ForeignKey',
      'stav_id'      => 'ForeignKey',
      'zakaznik_id'  => 'ForeignKey',
      'faktura_id'   => 'ForeignKey',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'slug'         => 'Text',
    );
  }
}
