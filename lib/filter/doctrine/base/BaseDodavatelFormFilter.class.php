<?php

/**
 * Dodavatel filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDodavatelFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mena_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'jmeno'      => new sfWidgetFormFilterInput(),
      'prijmeni'   => new sfWidgetFormFilterInput(),
      'organizace' => new sfWidgetFormFilterInput(),
      'ulice'      => new sfWidgetFormFilterInput(),
      'psc'        => new sfWidgetFormFilterInput(),
      'mesto'      => new sfWidgetFormFilterInput(),
      'ico'        => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mena_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'jmeno'      => new sfValidatorPass(array('required' => false)),
      'prijmeni'   => new sfValidatorPass(array('required' => false)),
      'organizace' => new sfValidatorPass(array('required' => false)),
      'ulice'      => new sfValidatorPass(array('required' => false)),
      'psc'        => new sfValidatorPass(array('required' => false)),
      'mesto'      => new sfValidatorPass(array('required' => false)),
      'ico'        => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dodavatel_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dodavatel';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'mena_id'    => 'ForeignKey',
      'jmeno'      => 'Text',
      'prijmeni'   => 'Text',
      'organizace' => 'Text',
      'ulice'      => 'Text',
      'psc'        => 'Text',
      'mesto'      => 'Text',
      'ico'        => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'slug'       => 'Text',
    );
  }
}
