<?php

/**
 * MenaKurz filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMenaKurzFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'vychozi_mena' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Vychozi'), 'add_empty' => true)),
      'cilova_mena'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cilova'), 'add_empty' => true)),
      'kurz'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'vychozi_mena' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Vychozi'), 'column' => 'id')),
      'cilova_mena'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cilova'), 'column' => 'id')),
      'kurz'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('mena_kurz_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenaKurz';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'vychozi_mena' => 'ForeignKey',
      'cilova_mena'  => 'ForeignKey',
      'kurz'         => 'Number',
    );
  }
}
