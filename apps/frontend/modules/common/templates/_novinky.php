<ul id="novinky">
    <li class="nadpis">Novinky</li>
    <?php
    use_helper('Date');
    foreach ($akce as $item) {
        $link = '<div class="datum">' . format_date($item->getPlatneOd(),'D') . '</div><p>' . $item->getTitle() . '</p>';
        echo '<li>' . link_to($link, '@akce?slug=' . $item->getSlug()) . '</li>';
    }
    ?>
</ul>
