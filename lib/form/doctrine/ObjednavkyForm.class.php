<?php

/**
 * Objednavky form.
 *
 * @package    Sipkova E Shop
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ObjednavkyForm extends BaseObjednavkyForm
{
  public function configure()
  {
      $this->embedRelation('Polozky');
  }
}
