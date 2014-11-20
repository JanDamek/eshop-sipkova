<?php

/**
 * PayPal form.
 *
 * @package    E Shop
 * @subpackage form
 * @author     Jan Damek, damekjan74@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PayPalForm extends BasePayPalForm {

    public function configure() {
        $this->setWidget('img', new sfWidgetFormInputMediaBrowser());
    }

}
