<ul class="footmenu">
    <?php
    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */
    $first = true;
    foreach ($downmenu as $item) {
        if (!$first) {
            echo "<li>|</li>";
        }
        echo '<li>';
        echo link_to($item->getTitle(), '@kategorie?slug=' . $item->getSlug());
        echo '</li>';
        $first = false;
    }
    ?>
</ul>