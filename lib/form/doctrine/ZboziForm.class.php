<?php

/**
 * Zbozi form.
 *
 * @package    Sipkova E Shop
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ZboziForm extends BaseZboziForm {

    public function configure() {

//        GLOBAL $lang;
//        $this->embedI18n($lang);

        $this->widgetSchema['kategorie_list']
                ->setOption('renderer_class', 'sfWidgetFormSelectDoubleList')
                ->setOption('renderer_options', array('label_unassociated' => 'Nepřiřazeno', 'label_associated' => 'Přiřazeno'));
              
        $this->embedRelation('Ceny');

        $this->setWidget('popis', new sfWidgetFormTextareaTinyMCE(array(
                    'width' => 750,
                    'height' => 550,
                    'config' => '
      entity_encoding: "raw",
      inline_styles : true,
      plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
      theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
      theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
      theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
      file_browser_callback: "sfMediaBrowserWindowManager.tinymceCallback",
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : true
      ',
                )));

        $this->setWidget('perex', new sfWidgetFormTextareaTinyMCE(array(
                    'width' => 750,
                    'height' => 250,
                    'config' => '
      entity_encoding: "raw",
      inline_styles : true,
      plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
      theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
      theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
      theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
      file_browser_callback: "sfMediaBrowserWindowManager.tinymceCallback",
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : true
      ',
                )));

        $this->setWidget('perex_img', new sfWidgetFormInputMediaBrowser());
        $this->setWidget('nazev_img', new sfWidgetFormInputMediaBrowser());

//        $this->setWidget('gallery_id', new sfWidgetFormDoctrineJQueryAutocompleter(array(
//                    'model' => 'Gallery',
//                    'url' => '/backend.php/gallery/ajaxGallery'
//                )));
        
        $this->widgetSchema['slozeni_list']
                ->setOption('renderer_class', 'sfWidgetFormSelectDoubleList')
                ->setOption('renderer_options', array('label_unassociated' => 'Nepřiřazeno', 'label_associated' => 'Přiřazeno'));
        

//        $this->setWidget('kategorie_id', new sfWidgetFormDoctrineChoice(
//                        array('model' => 'Kategorie', 'method' => 'getName'
//                            , 'query' =>
//                                    Doctrine_Core::getTable('Kategorie')
//                                    ->createQuery()
//                                    ->where('typ=?', 'Zboží')
//                )));
    }

}
