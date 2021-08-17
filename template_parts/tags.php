<?php 
/**
 * 
 *  Tags
 */
?>

<div class="flex items-center flex-wrap gap-2">
    <?php
        if ($row = $db->fetch_by_sql("SELECT * FROM taxonomy WHERE tax_type='tag'")) :
        foreach ($row as $data) :
    ?>
     <a href="#" data-id="<?php echo $data['tax_id']; ?>" class="tag-id px-3 py-1  text-sm border border-blue-200 rounded-sm transition-0.3 hover:bg-blue-500 hover:text-white">
            <?php echo $data['tax_name']; ?>
    </a>
     <?php 
            endforeach;
        endif;
     ?>
 </div>