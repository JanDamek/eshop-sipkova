<?php

/**
 * Zakaznik filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseZakaznikFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'skupina_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Skupina'), 'add_empty' => true)),
      'mena_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'jmeno'          => new sfWidgetFormFilterInput(),
      'prijmeni'       => new sfWidgetFormFilterInput(),
      'organizace'     => new sfWidgetFormFilterInput(),
      'ulice'          => new sfWidgetFormFilterInput(),
      'psc'            => new sfWidgetFormFilterInput(),
      'mesto'          => new sfWidgetFormFilterInput(),
      'dorucit_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'), 'add_empty' => true)),
      'ico'            => new sfWidgetFormFilterInput(),
      'jmeno_ico'      => new sfWidgetFormFilterInput(),
      'prijmeni_ico'   => new sfWidgetFormFilterInput(),
      'organizace_ico' => new sfWidgetFormFilterInput(),
      'ulice_ico'      => new sfWidgetFormFilterInput(),
      'psc_ico'        => new sfWidgetFormFilterInput(),
      'mesto_ico'      => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'username'       => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'password'       => new sfValidatorPass(array('required' => false)),
      'skupina_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Skupina'), 'column' => 'id')),
      'mena_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'jmeno'          => new sfValidatorPass(array('required' => false)),
      'prijmeni'       => new sfValidatorPass(array('required' => false)),
      'organizace'     => new sfValidatorPass(array('required' => false)),
      'ulice'          => new sfValidatorPass(array('required' => false)),
      'psc'            => new sfValidatorPass(array('required' => false)),
      'mesto'          => new sfValidatorPass(array('required' => false)),
      'dorucit_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ZemeUrceni'), 'column' => 'id')),
      'ico'            => new sfValidatorPass(array('required' => false)),
      'jmeno_ico'      => new sfValidatorPass(array('required' => false)),
      'prijmeni_ico'   => new sfValidatorPass(array('required' => false)),
      'organizace_ico' => new sfValidatorPass(array('required' => false)),
      'ulice_ico'      => new sfValidatorPass(array('required' => false)),
      'psc_ico'        => new sfValidatorPass(array('required' => false)),
      'mesto_ico'      => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zakaznik_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zakaznik';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'username'       => 'Text',
      'email'          => 'Text',
      'password'       => 'Text',
      'skupina_id'     => 'ForeignKey',
      'mena_id'        => 'ForeignKey',
      'jmeno'          => 'Text',
      'prijmeni'       => 'Text',
      'organizace'     => 'Text',
      'ulice'          => 'Text',
      'psc'            => 'Text',
      'mesto'          => 'Text',
      'dorucit_id'     => 'ForeignKey',
      'ico'            => 'Text',
      'jmeno_ico'      => 'Text',
      'prijmeni_ico'   => 'Text',
      'organizace_ico' => 'Text',
      'ulice_ico'      => 'Text',
      'psc_ico'        => 'Text',
      'mesto_ico'      => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'slug'           => 'Text',
    );
  }
}
