<?php

/**
 * Kategorie form base class.
 *
 * @method Kategorie getObject() Returns the current form's model object
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseKategorieForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'parent_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('KategorieParent'), 'add_empty' => true)),
      'popis'       => new sfWidgetFormTextarea(),
      'poradi'      => new sfWidgetFormInputText(),
      'enabled'     => new sfWidgetFormInputCheckbox(),
      'pozice'      => new sfWidgetFormChoice(array('choices' => array('Levý sloupec' => 'Levý sloupec', 'Horní pruh' => 'Horní pruh', 'Dolní pruh' => 'Dolní pruh'))),
      'typ'         => new sfWidgetFormChoice(array('choices' => array('Zboží' => 'Zboží', 'Stránky' => 'Stránky', 'Akce' => 'Akce'))),
      'keywords'    => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'slug'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50)),
      'title'       => new sfValidatorString(array('max_length' => 50)),
      'parent_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('KategorieParent'), 'required' => false)),
      'popis'       => new sfValidatorString(array('required' => false)),
      'poradi'      => new sfValidatorInteger(array('required' => false)),
      'enabled'     => new sfValidatorBoolean(array('required' => false)),
      'pozice'      => new sfValidatorChoice(array('choices' => array(0 => 'Levý sloupec', 1 => 'Horní pruh', 2 => 'Dolní pruh'), 'required' => false)),
      'typ'         => new sfValidatorChoice(array('choices' => array(0 => 'Zboží', 1 => 'Stránky', 2 => 'Akce'), 'required' => false)),
      'keywords'    => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('max_length' => 255)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Kategorie', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'Kategorie', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('kategorie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Kategorie';
  }

}
