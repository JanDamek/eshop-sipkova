<?php

/**
 * Slozeni filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSlozeniFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'perex'       => new sfWidgetFormFilterInput(),
      'perex_img'   => new sfWidgetFormFilterInput(),
      'img'         => new sfWidgetFormFilterInput(),
      'popis'       => new sfWidgetFormFilterInput(),
      'enabled'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'keywords'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'        => new sfWidgetFormFilterInput(),
      'zbozi_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Zbozi')),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'title'       => new sfValidatorPass(array('required' => false)),
      'perex'       => new sfValidatorPass(array('required' => false)),
      'perex_img'   => new sfValidatorPass(array('required' => false)),
      'img'         => new sfValidatorPass(array('required' => false)),
      'popis'       => new sfValidatorPass(array('required' => false)),
      'enabled'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'keywords'    => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'        => new sfValidatorPass(array('required' => false)),
      'zbozi_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Zbozi', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('slozeni_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addZboziListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.SlozeniZbozi SlozeniZbozi')
      ->andWhereIn('SlozeniZbozi.slozeni_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Slozeni';
  }

  public function getFields()
  {
    return array(
      'slozeni_id'  => 'Number',
      'name'        => 'Text',
      'title'       => 'Text',
      'perex'       => 'Text',
      'perex_img'   => 'Text',
      'img'         => 'Text',
      'popis'       => 'Text',
      'enabled'     => 'Boolean',
      'keywords'    => 'Text',
      'description' => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'slug'        => 'Text',
      'zbozi_list'  => 'ManyKey',
    );
  }
}
