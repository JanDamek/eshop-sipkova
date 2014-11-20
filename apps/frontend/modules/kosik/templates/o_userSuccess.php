<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
use_helper('Number', 'Date', 'Javascript');
?>
<?php echo 'Změna nastavení ' . link_to('uživatele', '@zmena_user') . '.'; ?><br /><br />
<div class="zakaznik">
    <div class="zak_obj">
        <?php 
//        echo link_to_function('Seznam objednavek', 'zak_obj()');
        ?>
        Seznam objednávek
    </div>
<!--    <div class="zak_fak">
        <?php 
//        echo link_to_function('Seznam faktur', 'zak_fak()');
        ?>
    </div>-->

    <div id="zak_obj">
        <table class="prehled">
            <tr>
                <th>číslo</th><th>stav</th><th>cena</th><th>platby</th><th>vytvořeno</th><th>zmeněno</th><th></th>
            </tr>
            <?php
            foreach ($objednavky as $key => $value) :
                ?>
                <tr>
                    <?php
                    echo '<td>' . $value->getId() . '</td><td>'
                    . link_to($value->getTyp(), '@obj_detail?slug=' . $value->getId()) . '</td>';
                    echo '<td>' . format_currency($value->getCelkem()) . ' ' . $value->getMena()->getOznaceni() .
                    '</td><td>' . $value->getPlatba()->getTitle() .
                    '</td><td>' . format_datetime($value->getCreatedAt(), 'f') .
                    '</td><td>' . format_datetime($value->getUpdatedAt(), 'f') . '</td><td>';

                    if ($value->getStav() == 'Nezaplaceno' || $value->getStav() == '') {
                        if ($value->getTyp() != 'Stornováno' && $value->getPlatba()->getSystemPlatby() == 'OnLine')
                            echo link_to('Zaplatit', '@pay?obj_id=' . $value->getId(), array('class' => 'zaplatit')).'&nbsp;';
//                        if ($value->getTyp() == "Přijato") {
//                            echo link_to('Stornovat', '@objednavka_storno?obj_id=' . $value->getId(), array('class' => 'storno')).'&nbsp;';
//                        }
                    }
                    echo '</td>';
                    ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<!--    <div id="zak_fak">
        <table>
            <tr>
                <th>Id</th><th>Stav</th><th>celkem</th><th>vytvoreno</th><th>zmeneno</th><th>akce</th>
            </tr>
            <?php
//            foreach ($faktury as $key => $value) :
                ?>
                <tr>
                    <?php
//                    echo '<td>' . $value->getId() . '</td><td>'. link_to($value->getTyp(), '@fak_detail?slug=' . $value->getId()) . '</td>';
//                    echo '<td>' . format_currency($value->getCelkem()) . ' ' . $value->getMena()->getOznaceni() .'</td><td>' . format_datetime($value->getCreatedAt(), 'f') .'</td><td>' . format_datetime($value->getUpdatedAt(), 'f') . '</td>';
                    ?>
                </tr>
            <?php // endforeach; ?>
        </table>
    </div>-->
</div>