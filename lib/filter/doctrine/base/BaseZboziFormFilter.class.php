<?php

/**
 * Zbozi filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseZboziFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'kategorie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kategorie'), 'add_empty' => true)),
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'perex'        => new sfWidgetFormFilterInput(),
      'perex_img'    => new sfWidgetFormFilterInput(),
      'nazev_img'    => new sfWidgetFormFilterInput(),
      'baleni'       => new sfWidgetFormFilterInput(),
      'enabled'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'gallery_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'keywords'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cena'         => new sfWidgetFormFilterInput(),
      'dph_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DPH'), 'add_empty' => true)),
      'mena_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'popis'        => new sfWidgetFormFilterInput(),
      'skladem'      => new sfWidgetFormFilterInput(),
      'min_mno'      => new sfWidgetFormFilterInput(),
      'dodavatel_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dodavatel'), 'add_empty' => true)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'         => new sfWidgetFormFilterInput(),
      'slozeni_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Slozeni')),
    ));

    $this->setValidators(array(
      'kategorie_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Kategorie'), 'column' => 'id')),
      'name'         => new sfValidatorPass(array('required' => false)),
      'title'        => new sfValidatorPass(array('required' => false)),
      'perex'        => new sfValidatorPass(array('required' => false)),
      'perex_img'    => new sfValidatorPass(array('required' => false)),
      'nazev_img'    => new sfValidatorPass(array('required' => false)),
      'baleni'       => new sfValidatorPass(array('required' => false)),
      'enabled'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'gallery_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Gallery'), 'column' => 'id')),
      'keywords'     => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'cena'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'dph_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('DPH'), 'column' => 'id')),
      'mena_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'popis'        => new sfValidatorPass(array('required' => false)),
      'skladem'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'min_mno'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'dodavatel_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Dodavatel'), 'column' => 'id')),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'         => new sfValidatorPass(array('required' => false)),
      'slozeni_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Slozeni', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zbozi_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addSlozeniListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('SlozeniZbozi.zbozi_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Zbozi';
  }

  public function getFields()
  {
    return array(
      'zbozi_id'     => 'Number',
      'kategorie_id' => 'ForeignKey',
      'name'         => 'Text',
      'title'        => 'Text',
      'perex'        => 'Text',
      'perex_img'    => 'Text',
      'nazev_img'    => 'Text',
      'baleni'       => 'Text',
      'enabled'      => 'Boolean',
      'gallery_id'   => 'ForeignKey',
      'keywords'     => 'Text',
      'description'  => 'Text',
      'cena'         => 'Number',
      'dph_id'       => 'ForeignKey',
      'mena_id'      => 'ForeignKey',
      'popis'        => 'Text',
      'skladem'      => 'Number',
      'min_mno'      => 'Number',
      'dodavatel_id' => 'ForeignKey',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'slug'         => 'Text',
      'slozeni_list' => 'ManyKey',
    );
  }
}
