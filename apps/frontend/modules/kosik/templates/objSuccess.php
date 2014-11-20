<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
Vytvoreni objednavky
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use_helper('Number', 'Javascript');
?>
<div id="polozky">
    Seznam položek v košíku
    <table style="width: 100%" class="prehled">
        <tr>
            <td>Názve</td>
            <td>Množství</td>
            <td>Cena</td>
            <td style="text-align: right; padding-right: 15px;">Celkem</td>
            <td>DPH</td>
        </tr>
        <?php
        $celkem = 0;
        foreach ($kosik as $item) {
            ?>    
            <tr>
                <td><?php echo $item->getZbozi()->getTitle(); ?></td>
                <td>
                    <?php echo $item->getMno(); ?>
                </td>
                <td><?php echo format_currency(UserHelper::getInstance()->getCena($item->getZbozi())) . ' ' . $mena; ?></td>  
                <td style="text-align: right; padding-right: 15px;"><?php
                $cena_celk = UserHelper::getInstance()->getCena($item->getZbozi()) * $item->getMno();
                $celkem +=$cena_celk;
                echo format_currency($cena_celk) . ' ' . $mena;
                    ?></td>
                <td><small><?php echo $item->getZbozi()->getDPH()->getTitle(); ?></small></td>
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

<div id="doruceni">
    Typ doručení a způsob dodání/odběru<br />
    <table style="width: 95%">
        <tr>
            <td>Název</td>
            <td>Cena</td>
        </tr>
        <?php
        foreach ($doruceni as $value) {
            if ($value->getSlug() == $dor) {
                ?>                
                <tr>
                    <td><?php echo $value->getTitle(); ?></td>
                    <td><?php echo $value->getCena(); ?></td>
                </tr>
                <?php
            }
            if ($value->getPobockyDoprava()->count() > 0) {
                ?>
                <?php
                foreach ($value->getPobockyDoprava() as $pobo) {
                    if ($pobo->getSlug() == $do_po) {
                        ?>                    
                        <tr>
                            <td style="padding-left: 25px;"><?php echo $pobo->getTitle(); ?> </td>
                            <td><?php echo $pobo->getCena(); ?></td>
                        </tr>
                        <?php
                    }
                }
            }
        }
        ?>
    </table>
</div>
<hr />

<div id="divplatba">
    Typ platby dle doručení
    <div id="platba"><?php include_partial('kosik/platba', array('platba' => $platba, 'pl' => $pl, 'obj' => true)); ?></div>
</div>
<hr/>

<div id="faktura">
    Fakturační a dodáci údaje
    <table style="width: 95%">        
        <tr>
            <td>E-mail:</td><td><?php echo $zakaznik->getEmail(); ?></td>
        </tr>
        <tr>
            <td>Skupina:</td><td><?php echo $zakaznik->getSkupina(); ?></td>
        </tr>
        <tr>
            <td>Jméno:</td><td><?php echo $zakaznik->getJmeno(); ?></td>
        </tr>
        <tr>
            <td>Přijmení:</td><td><?php echo $zakaznik->getPrijmeni(); ?></td>
        </tr>
        <tr>
            <td>Organizace:</td><td><?php echo $zakaznik->getOrganizace(); ?></td>
        </tr>
        <tr>
            <td>Ulice:</td><td><?php echo $zakaznik->getUlice(); ?></td>
        </tr>
        <tr>
            <td>PSČ:</td><td><?php echo $zakaznik->getPsc(); ?></td>
        </tr>
        <tr>
            <td>Město:</td><td><?php echo $zakaznik->getMesto(); ?></td>
        </tr>
        <tr>
            <td>IČO:</td><td><?php echo $zakaznik->getIco(); ?></td>
        </tr>
        <tr>
            <td>Organizace:</td><td><?php echo $zakaznik->getOrganizaceIco(); ?></td>
        </tr>
        <tr>
            <td>Jméno:</td><td><?php echo $zakaznik->getJmenoIco(); ?></td>
        </tr>
        <tr>
            <td>Příjemní:</td><td><?php echo $zakaznik->getPrijmeniIco(); ?></td>
        </tr>
        <tr>
            <td>Ulice:</td><td><?php echo $zakaznik->getUliceIco(); ?></td>
        </tr>
        <tr>
            <td>PSČ:</td><td><?php echo $zakaznik->getPscIco(); ?></td>
        </tr>
        <tr>
            <td>Město:</td><td><?php echo $zakaznik->getMestoIco(); ?></td>
        </tr>
    </table>
</div>
<?php
echo link_to('Objednat', '@obj_final');
