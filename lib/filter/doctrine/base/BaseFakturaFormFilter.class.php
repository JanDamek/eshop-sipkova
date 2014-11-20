<?php

/**
 * Faktura filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFakturaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'faktura_obj_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FakturaObj'), 'add_empty' => true)),
      'stav'           => new sfWidgetFormChoice(array('choices' => array('' => '', 'Vystaveno' => 'Vystaveno', 'Splatno' => 'Splatno', 'Proplaceno' => 'Proplaceno', 'Stornováno' => 'Stornováno'))),
      'sleva'          => new sfWidgetFormFilterInput(),
      'celkem_dopl'    => new sfWidgetFormFilterInput(),
      'celkem'         => new sfWidgetFormFilterInput(),
      'mena_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'zakaznik_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => true)),
      'objednavka_id'  => new sfWidgetFormFilterInput(),
      'doprava_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'), 'add_empty' => true)),
      'platba_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Platba'), 'add_empty' => true)),
      'pobocka_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PobockyDoprava'), 'add_empty' => true)),
      'splatnost'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'faktura_obj_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('FakturaObj'), 'column' => 'id')),
      'stav'           => new sfValidatorChoice(array('required' => false, 'choices' => array('Vystaveno' => 'Vystaveno', 'Splatno' => 'Splatno', 'Proplaceno' => 'Proplaceno', 'Stornováno' => 'Stornováno'))),
      'sleva'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'celkem_dopl'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'celkem'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mena_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'zakaznik_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zakaznik'), 'column' => 'id')),
      'objednavka_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'doprava_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Doprava'), 'column' => 'doprava_id')),
      'platba_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Platba'), 'column' => 'id')),
      'pobocka_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PobockyDoprava'), 'column' => 'pobocka_id')),
      'splatnost'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faktura_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faktura';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'faktura_obj_id' => 'ForeignKey',
      'stav'           => 'Enum',
      'sleva'          => 'Number',
      'celkem_dopl'    => 'Number',
      'celkem'         => 'Number',
      'mena_id'        => 'ForeignKey',
      'zakaznik_id'    => 'ForeignKey',
      'objednavka_id'  => 'Number',
      'doprava_id'     => 'ForeignKey',
      'platba_id'      => 'ForeignKey',
      'pobocka_id'     => 'ForeignKey',
      'splatnost'      => 'Date',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'slug'           => 'Text',
    );
  }
}
