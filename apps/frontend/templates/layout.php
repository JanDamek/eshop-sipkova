<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="cs" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body id="body">
        <div id="tophead">
            <?php include_component("common", "login"); ?>
        </div>
        <div id="page">
            <!-- HEADRE -->
            <div id="header">
                <?php include_component("common", "topmenu"); ?>
                <br />
                <br />
                <?php include_component("common", "kosik"); ?>
            </div>

            <!-- END HEADRE -->

            <!-- CONTENT -->
            <div id="content">
                <div id="side">
                    <img src="/pic/logo_left_menu.jpg" alt="logo_left_menu.jpg, 6,4kB" title="Logo left menu" border="0" height="84" width="197" />

                        <?php include_component("common", "leftmenu"); ?>
                        
                        <?php include_component("common", "novinky"); ?>

                        <div id="facebook">
                            <p>Jsme i na</p>
                            <a href="http://www.facebook.com/<?php echo NavigationHelper::getSetting()->getFacebookUrl();?>">www.facebook.com</a>
                        </div>
                </div>
                <!-- OBSAH --> 
                <div id="obsah">
                    <?php echo $sf_content; ?>
                </div>
                <!-- END OBSAH --> 
            </div>
            <!-- END CONTENT -->
        </div>

        <!-- FOOTER -->
        <div id="footer">
            <div class="wrapfoot">
                <div class="copy">
                    <img src="/pic/logo_footer.png" style="float: left; margin: 0px 20px 0px 0px;" alt="logo_footer" title="Logo footer" border="0" height="65" width="153" />
                        <p style="padding: 16px 0px 0px 0px;">Copyright © WORLD HEALTH CARE SHOP
                        <?php include_component("common", "downmenu"); ?>    
                        </p>  
                </div> 
                <div class="kontakt">
                    <div class="telefon"><?php echo NavigationHelper::getSetting()->getTel(); ?><br /><?php echo NavigationHelper::getSetting()->getMobil(); ?></div>
                    <div class="email"><?php echo mail_to(NavigationHelper::getSetting()->getEmail(),NavigationHelper::getSetting()->getEmail(), array('encode' => true)) ?><br /><?php echo mail_to(NavigationHelper::getSetting()->getEmail2(),NavigationHelper::getSetting()->getEmail2(), array('encode' => true)) ?></div>  
                </div> 
                <div class="platba">
                    <div class="platbadv">
                        <img src="/pic/seznam.jpg" alt="seznam.jpg, 3,7kB" title="Seznam" border="0" height="31" width="88" />
                        <img src="/pic/platime_online.jpg" alt="platime_online.jpg, 2,2kB" title="Platime online" border="0" height="31" width="88" />
                        <img src="/pic/platby.jpg" alt="platby.jpg, 3,4kB" title="Platby" border="0" height="18" width="132" />
                    </div>
                </div>  
            </div>  
        </div>
        <!-- END FOOTER -->
    </body>
</html>
