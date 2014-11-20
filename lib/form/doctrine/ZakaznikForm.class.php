<?php

/**
 * Zakaznik form.
 *
 * @package    Sipkova E Shop
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ZakaznikForm extends BaseZakaznikForm
{
  public function configure()
  {
      parent::configure();
      
      unset($this['skupina_id']);
      
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),        
      'username'       => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'email'          => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'password'       => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'mena_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Mena'), 'add_empty' => false),array('class'=>'inp-select')),
      'jmeno'          => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'prijmeni'       => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'organizace'     => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'ulice'          => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'psc'            => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'mesto'          => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'dorucit_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ZemeUrceni'), 'add_empty' => false),array('class'=>'inp-select')),
      'ico'            => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'jmeno_ico'      => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'prijmeni_ico'   => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'organizace_ico' => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'ulice_ico'      => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'psc_ico'        => new sfWidgetFormInputText(array(),array('class'=>'inp-text')),
      'mesto_ico'      => new sfWidgetFormInputText(array(),array('class'=>'inp-text'))
    ));    
    
    $this->widgetSchema->setLabels(array(
      'username'       => 'Užívatelské jméno',
      'email'          => 'E - mail',
      'password'       => 'Heslo',
      'mena_id'        => 'Hlavní měna',
      'jmeno'          => 'Jméno',
      'prijmeni'       => 'Příjmení',
      'organizace'     => 'Organizace',
      'ulice'          => 'Ulice',
      'psc'            => 'PSČ',
      'mesto'          => 'Město',
      'dorucit_id'     => 'Doručit do země',
      'ico'            => 'IČO',
      'jmeno_ico'      => 'Jméno',
      'prijmeni_ico'   => 'Příjmení',
      'organizace_ico' => 'Organizace',
      'ulice_ico'      => 'Ulice',
      'psc_ico'        => 'PSČ',
      'mesto_ico'      => 'Město'
        ));
      
      $this->validatorSchema['email'] = new sfValidatorEmail();
      
    $this->widgetSchema->setNameFormat('zakaznik[%s]');
      
  }
}
