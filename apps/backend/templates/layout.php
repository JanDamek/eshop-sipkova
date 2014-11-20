<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <script type="text/javascript">
            sfMediaBrowserWindowManager.init('/backend.php/sf_media_browser/select');
        </script>
    </head>
    <body>
        <?php
        if ($sf_user->isAuthenticated()) :
            ?>
            <div style="width: 100%; height: 40px">
                <ul class="menu" id="menu">
                    <li class="menulink">Objednavky
                        <ul>
                            <li class="menulink">Nastavení >
                                <ul>
                                    <li><?php echo link_to('Zeme urceni', '@zeme_urceni', array('class' => 'sub')) ?></li>
                                    <li><?php echo link_to('Doprava', '@doprava', array('class' => 'sub')) ?></li>
                                    <li><?php echo link_to('Pobocky doruceni', '@pobocky_doprava', array('class' => 'sub')) ?></li>
                                    <li><?php echo link_to('Platba', '@platba', array('class' => 'sub')) ?></li>
<!--                                    <li class="sub"><center>-</center></li>
                                    <li><?php // echo link_to('Stavy objednávek', '@stav_objednavky', array('class' => 'sub')) ?></li>-->
                                </ul>
                            </li>
                            <li><?php echo link_to('Ojednávky', '@objednavky', array('class' => 'sub')) ?></li>
                            <li><?php echo link_to('Polozky ojednávek', '@polozky_obj', array('class' => 'sub')) ?></li>
<!--                            <li class="sub"><center>-</center></li>
                            <li><?php // echo link_to('Faktury', '@faktura', array('class' => 'sub')) ?></li>
                            <li><?php // echo link_to('Polozky faktury', '@polozky_fak', array('class' => 'sub')) ?></li>-->
                        </ul>
                    </li>

                    <li class="menulink">Zboží
                        <ul>
                            <li><?php echo link_to('Zboží', '@zbozi', array('class' => 'sub')) ?></li>
                            <li><?php echo link_to('Ceny', '@ceny', array('class' => 'sub')) ?></li>
                            <li class="sub"><center>-</center></li>
                            <li><?php echo link_to('Slozeni', '@slozeni', array('class' => 'sub')) ?></li>
                            <li class="sub"><center>-</center></li>
                            <li><?php echo link_to('Galerie', '@gallery', array('class' => 'sub')) ?></li>
                            <li><?php echo link_to('Akce/Novinky', '@akce', array('class' => 'sub')) ?></li>
                            <li class="sub"><center>-</center></li>
                            <li><?php echo link_to('Kategorie', '@kategorie', array('class' => 'sub')) ?></li>
                            <li class="menulink">Měna/Kurz >
                                <ul>
                                    <li><?php echo link_to('Měny', '@mena', array('class' => 'sub')) ?></li>
                                    <li><?php echo link_to('Kurz', '@mena_kurz', array('class' => 'sub')) ?></li>
                                    <!--<li><?php // echo link_to('Zaokrouhlení', '@zaokrouhleni', array('class' => 'sub')) ?></li>-->
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="menulink">Zákazníci
                        <ul>
                            <li><?php echo link_to('Zákaznici', '@zakaznik', array('class' => 'sub')) ?></li>
                            <li class="menulink">O zákaznících >
                                <ul>
                                    <li><?php echo link_to('Obsah košíků', '@kosik', array('class' => 'sub')) ?></li>                                
                                </ul>
                            </li>
                            <li><?php echo link_to('Skupiny', '@skupina', array('class' => 'sub')) ?></li>                            
                        </ul>
                    </li>

                    <li class="menulink">Nastaveni
                        <ul>
                            <li><?php echo link_to('Sazby DPH', '@dph', array('class' => 'sub')) ?></li>
                            <li class="sub"><center>-</center></li>
                            <li><?php echo link_to('Globani data', 'setting/edit?id=1', array('class' => 'sub')) ?></li>
                            <li><?php echo link_to('Staticke stranky', '@stranky', array('class' => 'sub')) ?></li>
                            <li class="sub"><center>-</center></li>
                            <li><?php echo link_to('ePlatba', '@e_platba', array('class' => 'sub')) ?></li>
                            <li><?php echo link_to('GP WebPay', '@web_pay', array('class' => 'sub')) ?></li>
                            <li><?php echo link_to('Pay Pal', '@pay_pal', array('class' => 'sub')) ?></li>
                            <li class="sub"><center>-</center></li>
                            <li><?php echo link_to('Vymazat CACHE', '@vymazat_cache', array('class' => 'sub')) ?></li>
                            <li><?php echo link_to('Reindexace vyhledavání', '@reindexace_vyhledavani', array('class' => 'sub')) ?></li>
                            <li class="menulink">Uživatelé administrace >
                                <ul>
                                    <li><?php echo link_to('Uživatelé', '@sf_guard_user', array('class' => 'sub')) ?></li>
                                    <li><?php echo link_to('Skupiny', '@sf_guard_group', array('class' => 'sub')) ?></li>
                                    <li><?php echo link_to('Práva', '@sf_guard_permission', array('class' => 'sub')) ?></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menulink"><?php echo link_to('Odhlásit', 'sfGuardAuth/signout'); ?></li>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $sf_content ?>
        <script type="text/javascript">
            var menu=new menu.dd("menu");
            menu.init("menu","menuhover");
        </script>
    </body>
</html>
