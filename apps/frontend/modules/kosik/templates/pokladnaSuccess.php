<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use_helper('Number', 'Javascript');
?>
<div id="polozky">
    Seznam položek v košíku
    <form action="<?php echo url_for('@zmena_pok') ?>" method="post">
        <table style="width: 100%">
            <tr>
                <td>Názve</td>
                <td>Množství</td>
                <td>Cena</td>
                <td style="text-align: right; padding-right: 15px;">Celkem</td>
                <td>DPH</td>
                <td>&nbsp;</td>
            </tr>
            <?php
            $celkem = 0;
            foreach ($kosik as $item) {
                ?>    
                <tr>
                    <td><?php echo $item->getZbozi()->getTitle(); ?></td>
                    <td>
                        <input name="mno[<?php echo $item->getId(); ?>]" type="text" value="<?php echo $item->getMno(); ?>"/>
                    </td>
                    <td><?php echo format_currency(UserHelper::getInstance()->getCena($item->getZbozi())) . ' ' . $mena; ?></td>  
                    <td style="text-align: right; padding-right: 15px;"><?php
            $cena_celk = UserHelper::getInstance()->getCena($item->getZbozi()) * $item->getMno();
            $celkem +=$cena_celk;
            echo format_currency($cena_celk) . ' ' . $mena;
                ?></td>
                    <td><small><?php echo $item->getZbozi()->getDPH()->getTitle(); ?></small></td>
                    <td>
                        <!--<input type="submit" name="remove[<?php echo $item->getId(); ?>]" value="X" />-->
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: right; padding-right: 15px;">______________</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><b>Celkem:</b></td>
                <td style="text-align: right; padding-right: 15px;"><b><?php echo format_currency($celkem) . ' ' . $mena; ?></b></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <input type="submit" value="Zmenit" />
    </form>   

</div>
<hr />

<form action="<?php echo url_for('@zmena_dor') ?>" method="post">
    <div id="doruceni">
        Výběr typu doručení a způsob dodáni/odběru<br />
        <table style="width: 95%">
            <tr>
                <td></td>
                <td>Název</td>
                <td>Cena</td>
            </tr>
            <?php
            foreach ($doruceni as $value) {
                ?>
                <tr>
                    <td><input type="radio" name="doruceni" value="<?php echo $value->getSlug(); ?>"<?php
            if ($value->getSlug() == $dor) {
                echo 'checked="checked"';
            }
                ?> onclick="<?php echo remote_function(array('url' => 'kosik/platba_div?id=' . $value->getSlug(), 'update' => 'platba')); ?>" />
                    </td>
                    <td><?php echo $value->getTitle(); ?></td>
                    <td><?php echo $value->getCena(); ?></td>
                </tr>
                    <?php if ($value->getPobockyDoprava()->count() > 0) { ?>
                    <?php
                    foreach ($value->getPobockyDoprava() as $pobo) {
                        ?>                    
                <tr>
                            <td style="padding-left: 25px;"><input type="radio" name="pobo" value="<?php echo $pobo->getSlug(); ?>"<?php
            if ($pobo->getSlug() == $do_po) {
                echo 'checked="checked"';
            }
                        ?> onclick="<?php echo remote_function(array('url' => 'kosik/pobo_div?id=' . $pobo->getSlug(), 'update' => 'platba')); ?>" /></td>
                            <td style="padding-left: 25px;"><?php echo $pobo->getTitle(); ?> </td>
                            <td>0.00</td>
                        </tr>
                        <?php
                    }
                    ?>
                <?php } 
            }
            ?>
        </table>
        <input type="submit" value="Zmenit" />        
    </div>
    <hr />

    <div id="divplatba">
        Výběr typu platby dle doručení
        <div id="platba"><?php include_partial('kosik/platba', array('platba' => $platba, 'pl' => $pl)); ?></div>
    </div>
</form>
<hr/>

<div id="faktura">
    Fakturační a dodaci údaje
    <form action="<?php echo url_for('@pokladna') ?>" method="POST">
        <table>
            <?php echo $form ?>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Zmenit fakturační a dodací údaje" />
                </td>
            </tr>
        </table>
    </form>    
</div>
<?php
echo link_to('Provést objednávku', '@obj');
