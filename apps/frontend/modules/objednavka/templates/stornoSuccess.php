Opravdu chce stornovat objednávku číslo <?php echo $obj_id;?><br />
<div class="storno_obj">
    <div class="ano">
        <?php echo link_to('Ano', '@doStorno?obj_id='.$obj_id); ?>
    </div>
    <div class="ne">
        <?php echo link_to('Ne', '@username'); ?>
    </div>
</div>