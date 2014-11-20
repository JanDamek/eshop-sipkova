<?php

/**
 * Akce form base class.
 *
 * @method Akce getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAkceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'kategorie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Kategorie'), 'add_empty' => true)),
      'name'         => new sfWidgetFormInputText(),
      'title'        => new sfWidgetFormInputText(),
      'perex'        => new sfWidgetFormTextarea(),
      'perex_img'    => new sfWidgetFormTextarea(),
      'enabled'      => new sfWidgetFormInputCheckbox(),
      'zbozi_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'add_empty' => true)),
      'platne_od'    => new sfWidgetFormDateTime(),
      'platne_do'    => new sfWidgetFormDateTime(),
      'pocet_kusy'   => new sfWidgetFormInputText(),
      'gallery_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'add_empty' => true)),
      'keywords'     => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormInputText(),
      'cena'         => new sfWidgetFormInputText(),
      'mena_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => true)),
      'sleva'        => new sfWidgetFormInputText(),
      'popis'        => new sfWidgetFormTextarea(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'slug'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'kategorie_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Kategorie'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 50)),
      'title'        => new sfValidatorString(array('max_length' => 50)),
      'perex'        => new sfValidatorString(array('required' => false)),
      'perex_img'    => new sfValidatorString(array('required' => false)),
      'enabled'      => new sfValidatorBoolean(array('required' => false)),
      'zbozi_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Zbozi'), 'required' => false)),
      'platne_od'    => new sfValidatorDateTime(array('required' => false)),
      'platne_do'    => new sfValidatorDateTime(array('required' => false)),
      'pocet_kusy'   => new sfValidatorInteger(array('required' => false)),
      'gallery_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Gallery'), 'required' => false)),
      'keywords'     => new sfValidatorString(array('max_length' => 255)),
      'description'  => new sfValidatorString(array('max_length' => 255)),
      'cena'         => new sfValidatorNumber(array('required' => false)),
      'mena_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'required' => false)),
      'sleva'        => new sfValidatorNumber(array('required' => false)),
      'popis'        => new sfValidatorString(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'slug'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Akce', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Akce', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('akce[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Akce';
  }

}
