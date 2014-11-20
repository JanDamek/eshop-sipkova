<?php

/**
 * Slozeni form.
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SlozeniForm extends BaseSlozeniForm
{
  public function configure()
  {
      unset($this['zbozi_list']);
      
        $this->setWidget('perex_img', new sfWidgetFormInputMediaBrowser());
        $this->setWidget('img', new sfWidgetFormInputMediaBrowser());  
                
  }
}
