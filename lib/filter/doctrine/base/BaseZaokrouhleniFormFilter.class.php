<?php

/**
 * Zaokrouhleni filter form base class.
 *
 * @package    E Shop
 * @subpackage filter
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseZaokrouhleniFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'   => new sfWidgetFormFilterInput(),
      'metoda' => new sfWidgetFormChoice(array('choices' => array('' => '', 1 => '1', '0.01' => '0.01', '0.05' => '0.05', '0.1' => '0.1', '0.5' => '0.5'))),
    ));

    $this->setValidators(array(
      'name'   => new sfValidatorPass(array('required' => false)),
      'metoda' => new sfValidatorChoice(array('required' => false, 'choices' => array(1 => '1', '0.01' => '0.01', '0.05' => '0.05', '0.1' => '0.1', '0.5' => '0.5'))),
    ));

    $this->widgetSchema->setNameFormat('zaokrouhleni_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zaokrouhleni';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'name'   => 'Text',
      'metoda' => 'Enum',
    );
  }
}
