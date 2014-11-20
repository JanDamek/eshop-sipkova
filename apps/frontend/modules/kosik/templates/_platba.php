<?php
use_helper('Javascript');
if (isset($obj)) {
    ?>
    <table style="width: 95%" class="prehled">
        <tr>
            <td>Název</td>
            <td>Cena</td>
        </tr>
        <?php
        foreach ($platba as $item) {
            if ($item->getSlug() == $pl) {
                ?>
                <tr>
                    <td><?php echo $item->getTitle(); ?></td>
                    <td><?php echo $item->getCEna(); ?></td>
                </tr>
            <?php
            }
        }
        ?>
    </table>
    <?php
} else {
    ?>
    <table style="width: 95%" class="prehled">
        <tr>
            <td></td>
            <td>Název</td>
            <td>Cena</td>
        </tr>
        <?php
        foreach ($platba as $item) {
            ?>
            <tr><td>
                    <input type="radio" name="pl" value="<?php echo $item->getSlug(); ?>"<?php
            if ($item->getSlug() == $pl)
                echo 'checked="checked"';
            ?> onclick="<?php echo remote_function(array('url' => 'kosik/set_pl_div?id=' . $item->getSlug(), 'update' => 'platba')); ?>" />
                </td>
                <td><?php echo $item->getTitle(); ?></td>
                <td><?php echo $item->getCena(); ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
