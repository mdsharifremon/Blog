<?php 
/**
 * 
 *  Tags
 */
?>

<div class="flex items-center flex-wrap gap-2">
    <?php
        if ($row = $db->fetch_All("tag")) :
        foreach ($row as $data) :
    ?>
     <a href="#" data-id="<?php echo $data['tag_id']; ?>" class="tag-id px-3 py-1  text-sm border border-blue-200 rounded-sm transition-0.3 hover:bg-blue-500 hover:text-white">
            <?php echo $data['tag_name']; ?>
    </a>
     <?php 
            endforeach;
        endif;
     ?>
 </div>