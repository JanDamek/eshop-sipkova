<?php

/**
 * Doprava form.
 *
 * @package    Sipkova E Shop
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DopravaForm extends BaseDopravaForm
{
  public function configure()
  {
      
        $this->widgetSchema['pobocky_doprava_list']
                ->setOption('renderer_class', 'sfWidgetFormSelectDoubleList')
                ->setOption('renderer_options', array('label_unassociated' => 'Nepřiřazeno', 'label_associated' => 'Přiřazeno'));
        
      
  }
}
