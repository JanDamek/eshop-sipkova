<?php

/**
 * GalleryImage filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGalleryImageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gallery_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'is_active'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'path'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'alt'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'      => new sfWidgetFormFilterInput(),
      'ord'        => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'gallery_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Gallery'), 'column' => 'id')),
      'is_active'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'path'       => new sfValidatorPass(array('required' => false)),
      'alt'        => new sfValidatorPass(array('required' => false)),
      'title'      => new sfValidatorPass(array('required' => false)),
      'ord'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('gallery_image_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GalleryImage';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'gallery_id' => 'ForeignKey',
      'is_active'  => 'Boolean',
      'path'       => 'Text',
      'alt'        => 'Text',
      'title'      => 'Text',
      'ord'        => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
