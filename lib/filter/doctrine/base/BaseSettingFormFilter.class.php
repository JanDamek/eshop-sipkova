<?php

/**
 * Setting filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSettingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'SiteName'               => new sfWidgetFormFilterInput(),
      'email'                  => new sfWidgetFormFilterInput(),
      'email2'                 => new sfWidgetFormFilterInput(),
      'tel'                    => new sfWidgetFormFilterInput(),
      'mobil'                  => new sfWidgetFormFilterInput(),
      'pracovni_doba'          => new sfWidgetFormFilterInput(),
      'ulice'                  => new sfWidgetFormFilterInput(),
      'mesto'                  => new sfWidgetFormFilterInput(),
      'ga_code'                => new sfWidgetFormFilterInput(),
      'google_overeni'         => new sfWidgetFormFilterInput(),
      'hlavni_mena'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'vychozi_skupina_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SkupinaVychozi'), 'add_empty' => true)),
      'skupina_host_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SkupinaHost'), 'add_empty' => true)),
      'skupina_vel_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SkupinaVel'), 'add_empty' => true)),
      'interval_typ'           => new sfWidgetFormChoice(array('choices' => array('' => '', 'Hodina' => 'Hodina', 'Den' => 'Den', 'Mesic' => 'Mesic', 'Rok' => 'Rok'))),
      'interval_kontroly_meny' => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'SiteName'               => new sfValidatorPass(array('required' => false)),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'email2'                 => new sfValidatorPass(array('required' => false)),
      'tel'                    => new sfValidatorPass(array('required' => false)),
      'mobil'                  => new sfValidatorPass(array('required' => false)),
      'pracovni_doba'          => new sfValidatorPass(array('required' => false)),
      'ulice'                  => new sfValidatorPass(array('required' => false)),
      'mesto'                  => new sfValidatorPass(array('required' => false)),
      'ga_code'                => new sfValidatorPass(array('required' => false)),
      'google_overeni'         => new sfValidatorPass(array('required' => false)),
      'hlavni_mena'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Mena'), 'column' => 'id')),
      'vychozi_skupina_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SkupinaVychozi'), 'column' => 'id')),
      'skupina_host_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SkupinaHost'), 'column' => 'id')),
      'skupina_vel_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SkupinaVel'), 'column' => 'id')),
      'interval_typ'           => new sfValidatorChoice(array('required' => false, 'choices' => array('Hodina' => 'Hodina', 'Den' => 'Den', 'Mesic' => 'Mesic', 'Rok' => 'Rok'))),
      'interval_kontroly_meny' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('setting_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Setting';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'SiteName'               => 'Text',
      'email'                  => 'Text',
      'email2'                 => 'Text',
      'tel'                    => 'Text',
      'mobil'                  => 'Text',
      'pracovni_doba'          => 'Text',
      'ulice'                  => 'Text',
      'mesto'                  => 'Text',
      'ga_code'                => 'Text',
      'google_overeni'         => 'Text',
      'hlavni_mena'            => 'ForeignKey',
      'vychozi_skupina_id'     => 'ForeignKey',
      'skupina_host_id'        => 'ForeignKey',
      'skupina_vel_id'         => 'ForeignKey',
      'interval_typ'           => 'Enum',
      'interval_kontroly_meny' => 'Number',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
    );
  }
}
