<?php

/**
 * Doprava filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDopravaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zeme_urceni_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'), 'add_empty' => true)),
      'mena_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'title'                => new sfWidgetFormFilterInput(),
      'celkem'               => new sfWidgetFormFilterInput(),
      'cena'                 => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'                 => new sfWidgetFormFilterInput(),
      'pobocky_doprava_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'PobockyDoprava')),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'zeme_urceni_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ZemeUrceni'), 'column' => 'id')),
      'mena_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'title'                => new sfValidatorPass(array('required' => false)),
      'celkem'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cena'                 => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'                 => new sfValidatorPass(array('required' => false)),
      'pobocky_doprava_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'PobockyDoprava', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('doprava_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addPobockyDopravaListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.DopravaPobocka DopravaPobocka')
      ->andWhereIn('DopravaPobocka.pobocka_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Doprava';
  }

  public function getFields()
  {
    return array(
      'doprava_id'           => 'Number',
      'name'                 => 'Text',
      'zeme_urceni_id'       => 'ForeignKey',
      'mena_id'              => 'ForeignKey',
      'title'                => 'Text',
      'celkem'               => 'Number',
      'cena'                 => 'Number',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'slug'                 => 'Text',
      'pobocky_doprava_list' => 'ManyKey',
    );
  }
}
