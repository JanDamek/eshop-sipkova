<?php
use_helper('Date');
foreach ($kat as $itemk) {
    ?>
    <h2><?php echo $itemk->getTitle(); ?></h2>
    <ul id="novinky">
        <?php
        foreach ($akce as $item) {
            $link = '<div class="datum">' . format_date($item->getPlatneOd(), 'D') . '</div><p><strong>' . $item->getTitle() . '</strong><br />' .
                    $item->getRaw('perex') . '</p>';
            echo '<li>' . link_to($link, '@akce?slug=' . $item->getSlug()) . '</li>';
        }
        ?>
    </ul>
    <?php
}