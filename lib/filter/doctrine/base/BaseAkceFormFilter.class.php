<?php

/**
 * Akce filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAkceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kategorie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kategorie'), 'add_empty' => true)),
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'perex'        => new sfWidgetFormFilterInput(),
      'perex_img'    => new sfWidgetFormFilterInput(),
      'enabled'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'zbozi_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'add_empty' => true)),
      'platne_od'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'platne_do'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'pocet_kusy'   => new sfWidgetFormFilterInput(),
      'gallery_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'keywords'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cena'         => new sfWidgetFormFilterInput(),
      'mena_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'sleva'        => new sfWidgetFormFilterInput(),
      'popis'        => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'kategorie_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Kategorie'), 'column' => 'id')),
      'name'         => new sfValidatorPass(array('required' => false)),
      'title'        => new sfValidatorPass(array('required' => false)),
      'perex'        => new sfValidatorPass(array('required' => false)),
      'perex_img'    => new sfValidatorPass(array('required' => false)),
      'enabled'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'zbozi_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Zbozi'), 'column' => 'zbozi_id')),
      'platne_od'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'platne_do'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'pocet_kusy'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gallery_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Gallery'), 'column' => 'id')),
      'keywords'     => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'cena'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mena_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'sleva'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'popis'        => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('akce_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Akce';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'kategorie_id' => 'ForeignKey',
      'name'         => 'Text',
      'title'        => 'Text',
      'perex'        => 'Text',
      'perex_img'    => 'Text',
      'enabled'      => 'Boolean',
      'zbozi_id'     => 'ForeignKey',
      'platne_od'    => 'Date',
      'platne_do'    => 'Date',
      'pocet_kusy'   => 'Number',
      'gallery_id'   => 'ForeignKey',
      'keywords'     => 'Text',
      'description'  => 'Text',
      'cena'         => 'Number',
      'mena_id'      => 'ForeignKey',
      'sleva'        => 'Number',
      'popis'        => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'slug'         => 'Text',
    );
  }
}
