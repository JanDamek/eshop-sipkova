<?php

/**
 * Kategorie filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseKategorieFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'parent_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('KategorieParent'), 'add_empty' => true)),
      'popis'       => new sfWidgetFormFilterInput(),
      'poradi'      => new sfWidgetFormFilterInput(),
      'enabled'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pozice'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'Levý sloupec' => 'Levý sloupec', 'Horní pruh' => 'Horní pruh', 'Dolní pruh' => 'Dolní pruh'))),
      'typ'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'Zboží' => 'Zboží', 'Stránky' => 'Stránky', 'Akce' => 'Akce'))),
      'keywords'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'title'       => new sfValidatorPass(array('required' => false)),
      'parent_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('KategorieParent'), 'column' => 'id')),
      'popis'       => new sfValidatorPass(array('required' => false)),
      'poradi'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'enabled'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pozice'      => new sfValidatorChoice(array('required' => false, 'choices' => array('Levý sloupec' => 'Levý sloupec', 'Horní pruh' => 'Horní pruh', 'Dolní pruh' => 'Dolní pruh'))),
      'typ'         => new sfValidatorChoice(array('required' => false, 'choices' => array('Zboží' => 'Zboží', 'Stránky' => 'Stránky', 'Akce' => 'Akce'))),
      'keywords'    => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('kategorie_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Kategorie';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'title'       => 'Text',
      'parent_id'   => 'ForeignKey',
      'popis'       => 'Text',
      'poradi'      => 'Number',
      'enabled'     => 'Boolean',
      'pozice'      => 'Enum',
      'typ'         => 'Enum',
      'keywords'    => 'Text',
      'description' => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'slug'        => 'Text',
    );
  }
}
