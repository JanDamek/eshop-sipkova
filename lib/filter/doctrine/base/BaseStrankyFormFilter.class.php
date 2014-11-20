<?php

/**
 * Stranky filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStrankyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kategorie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kategorie'), 'add_empty' => true)),
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'gallery_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'perex'        => new sfWidgetFormFilterInput(),
      'popis'        => new sfWidgetFormFilterInput(),
      'enabled'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_homepage'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'keywords'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'kategorie_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Kategorie'), 'column' => 'id')),
      'name'         => new sfValidatorPass(array('required' => false)),
      'title'        => new sfValidatorPass(array('required' => false)),
      'gallery_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Gallery'), 'column' => 'id')),
      'perex'        => new sfValidatorPass(array('required' => false)),
      'popis'        => new sfValidatorPass(array('required' => false)),
      'enabled'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_homepage'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'keywords'     => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('stranky_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stranky';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'kategorie_id' => 'ForeignKey',
      'name'         => 'Text',
      'title'        => 'Text',
      'gallery_id'   => 'ForeignKey',
      'perex'        => 'Text',
      'popis'        => 'Text',
      'enabled'      => 'Boolean',
      'is_homepage'  => 'Boolean',
      'keywords'     => 'Text',
      'description'  => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'slug'         => 'Text',
    );
  }
}
