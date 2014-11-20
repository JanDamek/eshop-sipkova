<ul id="menu">
    <?php
    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */
    foreach ($topmenu as $item) {
        echo '<li>';
        echo link_to($item->getTitle(),'@kategorie?slug='.$item->getSlug());
        echo' </li>';
    }
    ?>
</ul>
