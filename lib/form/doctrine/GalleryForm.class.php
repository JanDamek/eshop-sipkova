<?php

/**
 * Gallery form.
 *
 * @package    caitalia
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GalleryForm extends BaseGalleryForm {

    public function configure() {

        $this->setWidget('path', new sfWidgetFormInputMediaBrowser());
        $this->widgetSchema['path']->setLabel('Obrázek galerie');

        $image_form = new GalleryImageForm();
        $this->embedForm('image', $image_form);
        $this->widgetSchema['image']->setLabel('Přidat obrázek');
    }

    public function bind(array $taintedValues = null, array $taintedFiles = null) {
        //var_dump($taintedValues);
        if (
                is_null($taintedValues['image']['path']) ||
                strlen($taintedValues['image']['path']) === 0) {
            unset($this->embeddedForms['image'], $taintedValues['image']);
            $this->validatorSchema['image'] = new sfValidatorPass();
        } else {
            $this->embeddedForms['image']->getObject()->setGallery($this->getObject());
        }
        $output = parent::bind($taintedValues, $taintedFiles);
        foreach ($this->embeddedForms as $name => $form) {
            $this->embeddedForms[$name]->isBound = true;
            if (isset($this->values[$name]))
                $this->embeddedForms[$name]->values = $this->values[$name];
        }

        return $output;
    }

}
