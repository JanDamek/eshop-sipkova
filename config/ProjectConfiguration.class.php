<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

GLOBAL $lang;
$lang = array('cs', 'en', 'it', 'de', 'ru');

class ProjectConfiguration extends sfProjectConfiguration {

    static protected $zendLoaded = false;

    static public function registerZend() {
        if (self::$zendLoaded) {
            return;
        }

        set_include_path(sfConfig::get('sf_lib_dir') . '/vendor' . PATH_SEPARATOR . get_include_path());
        require_once sfConfig::get('sf_lib_dir') . '/vendor/Zend/Loader/Autoloader.php';
        Zend_Loader_Autoloader::getInstance();
        self::$zendLoaded = true;
    }

    public function setup() {

        set_include_path(sfConfig::get('sf_lib_dir') . '/vendor' . PATH_SEPARATOR . get_include_path());

//        self::registerZend();
        $this->enablePlugins('sfDoctrineApplyPlugin');
        $this->enablePlugins('sfDoctrineGuardPlugin');
        $this->enablePlugins('sfFormExtraPlugin');
        $this->enablePlugins('sfImageTransformPlugin');
        $this->enablePlugins('sfJqueryReloadedPlugin');
        $this->enablePlugins('sfLightboxPlugin');
        $this->enablePlugins('sfMediaBrowserPlugin');
        $this->enablePlugins('sfDoctrinePlugin');
        $this->enablePlugins('eCropPlugin');
        $this->enablePlugins('sfAdminThemejRollerPlugin');      
        $this->enablePlugins('sfFacebookConnectPlugin');
        $this->enablePlugins('sfPaymentPayPalPlugin');
    }

}
