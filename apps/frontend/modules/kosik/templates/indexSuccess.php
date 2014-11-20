<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use_helper('Number');
?>
Vypis obsahu košíku a pokračování v objednávce<hr/>
<form action="<?php echo url_for('kosik/zmena') ?>" method="post">
    <table style="width: 100%" class="prehled">
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
                <td><?php echo format_currency(UserHelper::getInstance()->getCena($item->getZbozi())).' '.$mena; ?></td>  
                <td style="text-align: right; padding-right: 15px;"><?php
        $cena_celk = UserHelper::getInstance()->getCena($item->getZbozi()) * $item->getMno();
        $celkem +=$cena_celk;
        echo format_currency($cena_celk).' '.$mena;
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
            <td style="text-align: right; padding-right: 15px;"><b><?php echo format_currency($celkem).' '.$mena; ?></b></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <input type="submit" value="Zmenit" />
</form>   
<hr/>
<?php
echo link_to('Pokladna', '@pokladna');

