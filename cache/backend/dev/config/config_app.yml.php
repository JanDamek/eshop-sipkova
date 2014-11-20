<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2012/10/07 21:23:06
sfConfig::add(array(
  'app_sfImageTransformPlugin_default_adapter' => 'GD',
  'app_sfImageTransformPlugin_default_image' => array (
  'mime_type' => 'image/png',
  'filename' => 'Untitled.png',
  'width' => 100,
  'height' => 100,
  'color' => '#FFFFFF',
),
  'app_sfImageTransformPlugin_font_dir' => '/usr/share/fonts/truetype/msttcorefonts',
  'app_sfImageTransformPlugin_mime_type' => array (
  'auto_detect' => true,
  'library' => 'gd_mime_type',
),
  'app_sf_media_browser_root_dir' => '/uploads',
  'app_sf_media_browser_thumbnails_enabled' => true,
  'app_sf_media_browser_thumbnails_dir' => '.thumbnails',
  'app_sf_media_browser_thumbnails_max_width' => 64,
  'app_sf_media_browser_thumbnails_max_height' => 64,
  'app_sf_media_browser_assets_list' => array (
  'js' => 
  array (
    0 => '/sfMediaBrowserPlugin/js/list.js',
    1 => '/js/jquery.js',
    2 => '/js/jquery.dragndrop.js',
    3 => '/sfMediaBrowserPlugin/js/list.jquery.js',
  ),
  'css' => 
  array (
    0 => '/sfMediaBrowserPlugin/css/list.css',
  ),
),
  'app_sf_media_browser_assets_widget' => array (
  'js' => 
  array (
    0 => '/sfMediaBrowserPlugin/js/WindowManager.js',
    1 => '/sfMediaBrowserPlugin/js/form_widget.js',
  ),
  'css' => 
  array (
    0 => '/sfMediaBrowserPlugin/css/form_widget.css',
  ),
),
  'app_sf_media_browser_file_types' => array (
  'document' => 
  array (
    'extensions' => 
    array (
      0 => 'doc',
      1 => 'xls',
      2 => 'xcf',
      3 => 'ai',
    ),
    'icon' => 'doc',
  ),
  'image' => 
  array (
    'extensions' => 
    array (
      0 => 'png',
      1 => 'jpg',
      2 => 'jpeg',
      3 => 'gif',
    ),
  ),
  'pdf' => 
  array (
    'extensions' => 
    array (
      0 => 'pdf',
    ),
  ),
  'bin' => 
  array (
    'extensions' => 
    array (
      0 => 'bin',
      1 => 'exe',
      2 => 'sh',
      3 => 'bat',
      4 => 'deb',
      5 => 'yum',
    ),
  ),
  'video' => 
  array (
    'extensions' => 
    array (
      0 => 'wmv',
      1 => 'avi',
      2 => 'mpg',
      3 => 'mpeg',
      4 => 'flv',
      5 => 'mp4',
    ),
  ),
  'audio' => 
  array (
    'extensions' => 
    array (
      0 => 'ogg',
      1 => 'mp3',
      2 => 'flac',
      3 => 'wma',
      4 => 'cda',
    ),
  ),
  'text' => 
  array (
    'extensions' => 
    array (
      0 => 'txt',
    ),
  ),
  'tarball' => 
  array (
    'extensions' => 
    array (
      0 => 'tar',
      1 => 'gz',
      2 => 'zip',
      3 => 'bzip',
      4 => 'gzip',
      5 => 'rar',
      6 => '7z',
    ),
  ),
),
  'app_sf_admin_theme_jroller_plugin_web_dir' => '/sfAdminThemejRollerPlugin',
  'app_sf_admin_theme_jroller_plugin_use_jquery' => true,
  'app_sf_admin_theme_jroller_plugin_theme_dir' => '/sfAdminThemejRollerPlugin/css/jquery',
  'app_sf_admin_theme_jroller_plugin_theme' => 'redmond',
  'app_sf_admin_theme_jroller_plugin_theme_switcher' => false,
  'app_sf_admin_theme_jroller_plugin_css_reset' => true,
  'app_sf_admin_theme_jroller_plugin_list_actions_position' => 'left',
  'app_sf_admin_theme_jroller_plugin_edit_tab_position' => 'vertical',
  'app_sf_admin_theme_jroller_plugin_icons' => array (
  'new' => 'plus',
  'filter' => 'check',
  'filters' => 'search',
  'reset' => 'circle-close',
  'show' => 'document',
  'edit' => 'pencil',
  'delete' => 'trash',
  'list' => 'arrowreturnthick-1-w',
  'save' => 'circle-check',
  'saveAndAdd' => 'circle-plus',
  'first' => 'seek-first',
  'previous' => 'seek-prev',
  'next' => 'seek-next',
  'last' => 'seek-end',
),
  'app_facebook_api_key' => 'xxx',
  'app_facebook_api_secret' => 'xxx',
  'app_facebook_api_id' => 'xxx',
  'app_facebook_redirect_after_connect' => false,
  'app_facebook_redirect_after_connect_url' => '',
  'app_facebook_connect_signin_url' => 'sfFacebookConnectAuth/signin',
  'app_facebook_app_url' => '/my-app',
  'app_facebook_guard_adapter' => NULL,
  'app_facebook_js_framework' => 'none',
  'app_sf_guard_plugin_profile_class' => 'sfGuardUserProfile',
  'app_sf_guard_plugin_profile_field_name' => 'user_id',
  'app_sf_guard_plugin_profile_facebook_uid_name' => 'facebook_uid',
  'app_sf_guard_plugin_profile_email_name' => 'email',
  'app_sf_guard_plugin_profile_email_hash_name' => 'email_hash',
  'app_sf_guard_plugin_routes_register' => false,
  'app_facebook_connect_load_routing' => true,
  'app_facebook_connect_user_permissions' => array (
),
  'app_datagrid_date_format' => 'd/m/Y',
  'app_datagrid_datetime_format' => 'd/m/Y à H:i:s',
  'app_datagrid_images_dir' => '/sfDatagridPlugin/img/',
  'app_datagrid_class_for_foreign' => 'sfWidgetFormPropelChoice',
  'app_datagrid_jsframwork' => 'jquery',
  'app_datagrid_text_novalueinrows' => 'Rien dans cette liste',
  'app_datagrid_text_search' => 'Rechercher',
  'app_datagrid_text_reset' => 'Réinitialiser',
  'app_datagrid_text_validate' => 'Valider',
  'app_datagrid_text_page' => 'Page',
  'app_datagrid_text_defaultview' => '',
  'app_datagrid_label_null' => 'Date nulle',
  'app_datagrid_text_numberofrecords' => 'Nombre d\'enregistrements',
  'app_datagrid_text_loading' => 'Veuillez patienter',
  'app_datagrid_text_from' => 'Du',
  'app_datagrid_text_to' => 'Au',
  'app_datagrid_insert_pager_bottom' => true,
  'app_datagrid_freezepanes' => false,
  'app_datagrid_csspath' => array (
  'base' => '/sfDatagridPlugin/css/datagrid.css',
  'calendar' => '/sfDatagridPlugin/css/calendar.css',
),
));
