<?php

/**
 * PobockyDoprava filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePobockyDopravaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mena_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'title'         => new sfWidgetFormFilterInput(),
      'celkem'        => new sfWidgetFormFilterInput(),
      'cena'          => new sfWidgetFormFilterInput(),
      'adresa'        => new sfWidgetFormFilterInput(),
      'provozni_doba' => new sfWidgetFormFilterInput(),
      'mapa_adresa'   => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'          => new sfWidgetFormFilterInput(),
      'doprava_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Doprava')),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'mena_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'title'         => new sfValidatorPass(array('required' => false)),
      'celkem'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cena'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'adresa'        => new sfValidatorPass(array('required' => false)),
      'provozni_doba' => new sfValidatorPass(array('required' => false)),
      'mapa_adresa'   => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'          => new sfValidatorPass(array('required' => false)),
      'doprava_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Doprava', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pobocky_doprava_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addDopravaListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('DopravaPobocka.doprava_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'PobockyDoprava';
  }

  public function getFields()
  {
    return array(
      'pobocka_id'    => 'Number',
      'name'          => 'Text',
      'mena_id'       => 'ForeignKey',
      'title'         => 'Text',
      'celkem'        => 'Number',
      'cena'          => 'Number',
      'adresa'        => 'Text',
      'provozni_doba' => 'Text',
      'mapa_adresa'   => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'slug'          => 'Text',
      'doprava_list'  => 'ManyKey',
    );
  }
}
