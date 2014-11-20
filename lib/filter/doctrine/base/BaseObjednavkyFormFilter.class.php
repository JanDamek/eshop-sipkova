<?php

/**
 * Objednavky filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseObjednavkyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'typ'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'Přijato' => 'Přijato', 'Odeslano' => 'Odeslano', 'Doruceno' => 'Doruceno', 'Stornováno' => 'Stornováno'))),
      'stav'        => new sfWidgetFormChoice(array('choices' => array('' => '', 'Nezaplaceno' => 'Nezaplaceno', 'Zaplaceno' => 'Zaplaceno'))),
      'zakaznik_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zakaznik'), 'add_empty' => true)),
      'doprava_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Doprava'), 'add_empty' => true)),
      'platba_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Platba'), 'add_empty' => true)),
      'pobocka_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PobockyDoprava'), 'add_empty' => true)),
      'sleva'       => new sfWidgetFormFilterInput(),
      'celkem_dopl' => new sfWidgetFormFilterInput(),
      'celkem'      => new sfWidgetFormFilterInput(),
      'mena_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'typ'         => new sfValidatorChoice(array('required' => false, 'choices' => array('Přijato' => 'Přijato', 'Odeslano' => 'Odeslano', 'Doruceno' => 'Doruceno', 'Stornováno' => 'Stornováno'))),
      'stav'        => new sfValidatorChoice(array('required' => false, 'choices' => array('Nezaplaceno' => 'Nezaplaceno', 'Zaplaceno' => 'Zaplaceno'))),
      'zakaznik_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zakaznik'), 'column' => 'id')),
      'doprava_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Doprava'), 'column' => 'doprava_id')),
      'platba_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Platba'), 'column' => 'id')),
      'pobocka_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PobockyDoprava'), 'column' => 'pobocka_id')),
      'sleva'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'celkem_dopl' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'celkem'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mena_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('objednavky_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Objednavky';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'typ'         => 'Enum',
      'stav'        => 'Enum',
      'zakaznik_id' => 'ForeignKey',
      'doprava_id'  => 'ForeignKey',
      'platba_id'   => 'ForeignKey',
      'pobocka_id'  => 'ForeignKey',
      'sleva'       => 'Number',
      'celkem_dopl' => 'Number',
      'celkem'      => 'Number',
      'mena_id'     => 'ForeignKey',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'slug'        => 'Text',
    );
  }
}
