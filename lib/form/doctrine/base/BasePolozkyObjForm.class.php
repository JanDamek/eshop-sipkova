<?php

/**
 * PolozkyObj form base class.
 *
 * @method PolozkyObj getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePolozkyObjForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'obj_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objednavky'), 'add_empty' => false)),
      'stav'       => new sfWidgetFormChoice(array('choices' => array('Skladem' => 'Skladem', 'Objednat' => 'Objednat', 'Stornováno' => 'Stornováno', 'Vyskladneno' => 'Vyskladneno'))),
      'zbozi_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'add_empty' => false)),
      'mno'        => new sfWidgetFormInputText(),
      'cena'       => new sfWidgetFormInputText(),
      'sleva'      => new sfWidgetFormInputText(),
      'mena_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'obj_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Objednavky'))),
      'stav'       => new sfValidatorChoice(array('choices' => array(0 => 'Skladem', 1 => 'Objednat', 2 => 'Stornováno', 3 => 'Vyskladneno'), 'required' => false)),
      'zbozi_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'))),
      'mno'        => new sfValidatorNumber(array('required' => false)),
      'cena'       => new sfValidatorNumber(array('required' => false)),
      'sleva'      => new sfValidatorNumber(array('required' => false)),
      'mena_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'PolozkyObj', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('polozky_obj[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PolozkyObj';
  }

}
