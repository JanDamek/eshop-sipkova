<?php
use_helper('ImageResizer', 'User', 'Number');
foreach ($kat as $item) {
    echo "<h3>" . $item->getName() . "</h3>";
}
?>
<br />
<?php
foreach ($zbo as $item) {
    ?>
    <div class="produkt">
        <div class="imgp">
            <?php echo link_to(image_tag(image_resizer(310, 165, $item->getPerexImg()), array('title' => $item->getName(), 'alt' => $item->getName())), "@detail?slug=" . $item->getSlug()); ?>
        </div>
        <div class="nadpis">
            <?php
            if ($item->getNazevImg() == "") {
                echo "<center><big>" . link_to($item->getName(), "@detail?slug=" . $item->getSlug()) . "</big></center>";
            } else {
                echo link_to(image_tag(image_resizer(310, 45, $item->getNazevImg()), array('title' => $item->getName(), 'alt' => $item->getName())), "@detail?slug=" . $item->getSlug());
            }
            ?>
        </div>
        <p><?php echo $item->getRaw('perex'); ?></p>
        <p><?php echo $item->getBaleni(); ?></p>
        <div class="meta">
            <?php
            $cena = UserHelper::getInstance()->getCena($item);
            if (UserHelper::$je_sleva) {
                ?>    
                <div class="cena skrtnuti">cena:  <strong><?php echo format_currency(UserHelper::getInstance()->cena_zbozi($item->getCena(), $item->getMenaId())) . ' ' . $mena; ?></strong></div>
                <div class="posleve">cena po slevě:  <strong><?php echo format_currency($cena) . ' ' . $mena; ?></strong></div>
            <?php } else {
                ?>
                <div class="cena">cena:  <strong><?php echo format_currency(UserHelper::getInstance()->cena_zbozi($item->getCena(), $item->getMenaId())) . ' ' . $mena; ?></strong></div>
                <?php
            }
            echo link_to("<span>koupit</span>", "@koupit?slug=" . $item->getSlug(), array('class' => "koupit"));
            echo link_to("<span>detail</span>", "@detail?slug=" . $item->getSlug(), array('class' => "detail"));
            ?>
        </div>  
    </div>
    <?php
}
